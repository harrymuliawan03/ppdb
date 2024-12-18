<?php

namespace App\Http\Controllers;

use App\DataTables\SubjectDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Repositories\SubjectRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class SubjectController extends AppBaseController
{
    /** @var  SubjectRepository */
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:subject-edit', ['only' => ['edit']]);
        $this->middleware('can:subject-store', ['only' => ['store']]);
        $this->middleware('can:subject-show', ['only' => ['show']]);
        $this->middleware('can:subject-update', ['only' => ['update']]);
        $this->middleware('can:subject-delete', ['only' => ['delete']]);
        $this->middleware('can:subject-create', ['only' => ['create']]);
        $this->subjectRepository = $subjectRepo;
    }

    /**
     * Display a listing of the Subject.
     *
     * @param SubjectDataTable $subjectDataTable
     * @return Response
     */
    public function index(SubjectDataTable $subjectDataTable)
    {
        return $subjectDataTable->render('subjects.index');
    }

    /**
     * Show the form for creating a new Subject.
     *
     * @return Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created Subject in storage.
     *
     * @param CreateSubjectRequest $request
     *
     * @return Response
     */
    public function store(CreateSubjectRequest $request)
    {
        $input = $request->all();

        $subject = $this->subjectRepository->create($input);

        Flash::success('Subject saved successfully.');
        return redirect(route('subjects.index'));
    }

    /**
     * Display the specified Subject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subject = $this->subjectRepository->findWithoutFail($id);

        if (empty($subject)) {
            Flash::error('Subject not found');
            return redirect(route('subjects.index'));
        }

        return view('subjects.show')->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified Subject.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        

        $subject = $this->subjectRepository->findWithoutFail($id);

        if (empty($subject)) {
            Flash::error('Subject not found');
            return redirect(route('subjects.index'));
        }

        return view('subjects.edit')
            ->with('subject', $subject);
    }

    /**
     * Update the specified Subject in storage.
     *
     * @param  int              $id
     * @param UpdateSubjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubjectRequest $request)
    {
        $subject = $this->subjectRepository->findWithoutFail($id);

        if (empty($subject)) {
            Flash::error('Subject not found');
            return redirect(route('subjects.index'));
        }

        $input = $request->all();
        $subject = $this->subjectRepository->update($input, $id);

        Flash::success('Subject updated successfully.');
        return redirect(route('subjects.index'));
    }

    /**
     * Remove the specified Subject from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subject = $this->subjectRepository->findWithoutFail($id);

        if (empty($subject)) {
            Flash::error('Subject not found');
            return redirect(route('subjects.index'));
        }

        $this->subjectRepository->delete($id);

        Flash::success('Subject deleted successfully.');
        return redirect(route('subjects.index'));
    }

    /**
     * Store data Subject from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $subject = $this->subjectRepository->create($item->toArray());
            });
        });

        Flash::success('Subject saved successfully.');
        return redirect(route('subjects.index'));
    }
}
