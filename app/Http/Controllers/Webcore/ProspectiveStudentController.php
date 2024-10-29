<?php

namespace App\Http\Controllers\Webcore;

use App\DataTables\ProspectiveStudentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProspectiveStudentRequest;
use App\Http\Requests\UpdateProspectiveStudentRequest;
use App\Repositories\ProspectiveStudentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class ProspectiveStudentController extends AppBaseController
{
    /** @var  ProspectiveStudentRepository */
    private $prospectiveStudentRepository;

    public function __construct(ProspectiveStudentRepository $prospectiveStudentRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:prospectiveStudent-edit', ['only' => ['edit']]);
        $this->middleware('can:prospectiveStudent-store', ['only' => ['store']]);
        $this->middleware('can:prospectiveStudent-show', ['only' => ['show']]);
        $this->middleware('can:prospectiveStudent-update', ['only' => ['update']]);
        $this->middleware('can:prospectiveStudent-delete', ['only' => ['delete']]);
        $this->middleware('can:prospectiveStudent-create', ['only' => ['create']]);
        $this->prospectiveStudentRepository = $prospectiveStudentRepo;
    }

    /**
     * Display a listing of the ProspectiveStudent.
     *
     * @param ProspectiveStudentDataTable $prospectiveStudentDataTable
     * @return Response
     */
    public function index(ProspectiveStudentDataTable $prospectiveStudentDataTable)
    {
        return $prospectiveStudentDataTable->render('prospective_students.index');
    }

    /**
     * Show the form for creating a new ProspectiveStudent.
     *
     * @return Response
     */
    public function create()
    {
        $prospectiveStudent = \App\Models\ProspectiveStudent::all();
        

        return view('prospective_students.create')
            ->with('', $prospectiveStudent);
    }

    /**
     * Store a newly created ProspectiveStudent in storage.
     *
     * @param CreateProspectiveStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateProspectiveStudentRequest $request)
    {
        $input = $request->all();

        $prospectiveStudent = $this->prospectiveStudentRepository->create($input);

        Flash::success('Prospective Student saved successfully.');
        return redirect(route('prospectiveStudents.index'));
    }

    /**
     * Display the specified ProspectiveStudent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prospectiveStudent = $this->prospectiveStudentRepository->findWithoutFail($id);

        if (empty($prospectiveStudent)) {
            Flash::error('Prospective Student not found');
            return redirect(route('prospectiveStudents.index'));
        }

        return view('prospective_students.show')->with('prospectiveStudent', $prospectiveStudent);
    }

    /**
     * Show the form for editing the specified ProspectiveStudent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $prospectiveStudents = \App\Models\ProspectiveStudent::all();
        

        $prospectiveStudent = $this->prospectiveStudentRepository->findWithoutFail($id);

        if (empty($prospectiveStudent)) {
            Flash::error('Prospective Student not found');
            return redirect(route('prospectiveStudents.index'));
        }

        return view('prospective_students.edit')
            ->with('prospectiveStudent', $prospectiveStudent)
            ->with('', $prospectiveStudents);
    }

    /**
     * Update the specified ProspectiveStudent in storage.
     *
     * @param  int              $id
     * @param UpdateProspectiveStudentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProspectiveStudentRequest $request)
    {
        $prospectiveStudent = $this->prospectiveStudentRepository->findWithoutFail($id);

        if (empty($prospectiveStudent)) {
            Flash::error('Prospective Student not found');
            return redirect(route('prospectiveStudents.index'));
        }

        $input = $request->all();
        $prospectiveStudent = $this->prospectiveStudentRepository->update($input, $id);

        Flash::success('Prospective Student updated successfully.');
        return redirect(route('prospectiveStudents.index'));
    }

    /**
     * Remove the specified ProspectiveStudent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prospectiveStudent = $this->prospectiveStudentRepository->findWithoutFail($id);

        if (empty($prospectiveStudent)) {
            Flash::error('Prospective Student not found');
            return redirect(route('prospectiveStudents.index'));
        }

        $this->prospectiveStudentRepository->delete($id);

        Flash::success('Prospective Student deleted successfully.');
        return redirect(route('prospectiveStudents.index'));
    }

    /**
     * Store data ProspectiveStudent from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $prospectiveStudent = $this->prospectiveStudentRepository->create($item->toArray());
            });
        });

        Flash::success('Prospective Student saved successfully.');
        return redirect(route('prospectiveStudents.index'));
    }
}
