<?php

namespace App\Http\Controllers;

use App\DataTables\SchoolClassDataTable;
use App\DataTables\ShowClassDataTable;
use App\Http\Requests\CreateSchoolClassRequest;
use App\Http\Requests\UpdateSchoolClassRequest;
use App\Repositories\SchoolClassRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Major;
use App\User;
use Response;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Facades\Excel; 

class SchoolClassController extends AppBaseController
{
    /** @var  SchoolClassRepository */
    private $schoolClassRepository;

    public function __construct(SchoolClassRepository $schoolClassRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:schoolClass-edit', ['only' => ['edit']]);
        $this->middleware('can:schoolClass-store', ['only' => ['store']]);
        $this->middleware('can:schoolClass-show', ['only' => ['show']]);
        $this->middleware('can:schoolClass-update', ['only' => ['update']]);
        $this->middleware('can:schoolClass-delete', ['only' => ['delete']]);
        $this->middleware('can:schoolClass-create', ['only' => ['create']]);
        $this->schoolClassRepository = $schoolClassRepo;
    }

    /**
     * Display a listing of the SchoolClass.
     *
     * @param SchoolClassDataTable $schoolClassDataTable
     * @return Response
     */
    public function index(SchoolClassDataTable $schoolClassDataTable)
    {
        return $schoolClassDataTable->render('school_classes.index');
    }

    /**
     * Show the form for creating a new SchoolClass.
     *
     * @return Response
     */
    public function create()
    {
        $schoolClass = \App\Models\SchoolClass::all();

        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'teacher');
        })->pluck('name', 'id');

        $jurusans = Major::all()->pluck('nama_jurusan', 'id');
        

        return view('school_classes.create')
            ->with('', $schoolClass)
            ->with('teachers', $teachers)
            ->with('jurusans', $jurusans);
    }

    /**
     * Store a newly created SchoolClass in storage.
     *
     * @param CreateSchoolClassRequest $request
     *
     * @return Response
     */
    public function store(CreateSchoolClassRequest $request)
    {
        $input = $request->all();

        $schoolClass = $this->schoolClassRepository->create($input);

        Flash::success('School Class saved successfully.');
        return redirect(route('schoolClasses.index'));
    }

    /**
     * Display the specified SchoolClass.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, ShowClassDataTable $showClassDataTable)
    {
        $schoolClass = $this->schoolClassRepository->findWithoutFail($id);

        if (empty($schoolClass)) {
            Flash::error('School Class not found');
            return redirect(route('schoolClasses.index'));
        }

        $showClassDataTable->setIdSchoolClass($id);

        return $showClassDataTable->render('school_classes.show_index');
    }

    /**
     * Show the form for editing the specified SchoolClass.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $schoolClasses = \App\Models\SchoolClass::all();
        

        $schoolClass = $this->schoolClassRepository->findWithoutFail($id);
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'teacher');
        })->pluck('name', 'id');

        $jurusans = Major::all()->pluck('nama_jurusan', 'id');
        

        if (empty($schoolClass)) {
            Flash::error('School Class not found');
            return redirect(route('schoolClasses.index'));
        }

        return view('school_classes.edit')
            ->with('schoolClass', $schoolClass)
            ->with('teachers', $teachers)
            ->with('jurusans', $jurusans)
            ->with('', $schoolClasses);
    }

    /**
     * Update the specified SchoolClass in storage.
     *
     * @param  int              $id
     * @param UpdateSchoolClassRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchoolClassRequest $request)
    {
        $schoolClass = $this->schoolClassRepository->findWithoutFail($id);

        if (empty($schoolClass)) {
            Flash::error('School Class not found');
            return redirect(route('schoolClasses.index'));
        }

        $input = $request->all();
        $schoolClass = $this->schoolClassRepository->update($input, $id);

        Flash::success('School Class updated successfully.');
        return redirect(route('schoolClasses.index'));
    }

    /**
     * Remove the specified SchoolClass from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $schoolClass = $this->schoolClassRepository->findWithoutFail($id);

        if (empty($schoolClass)) {
            Flash::error('School Class not found');
            return redirect(route('schoolClasses.index'));
        }

        $this->schoolClassRepository->delete($id);

        Flash::success('School Class deleted successfully.');
        return redirect(route('schoolClasses.index'));
    }

    /**
     * Store data SchoolClass from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $schoolClass = $this->schoolClassRepository->create($item->toArray());
            });
        });

        Flash::success('School Class saved successfully.');
        return redirect(route('schoolClasses.index'));
    }
}
