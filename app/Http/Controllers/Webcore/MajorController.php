<?php

namespace App\Http\Controllers\Webcore;

use App\DataTables\MajorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Repositories\MajorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class MajorController extends AppBaseController
{
    /** @var  MajorRepository */
    private $majorRepository;

    public function __construct(MajorRepository $majorRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:major-edit', ['only' => ['edit']]);
        $this->middleware('can:major-store', ['only' => ['store']]);
        $this->middleware('can:major-show', ['only' => ['show']]);
        $this->middleware('can:major-update', ['only' => ['update']]);
        $this->middleware('can:major-delete', ['only' => ['delete']]);
        $this->middleware('can:major-create', ['only' => ['create']]);
        $this->majorRepository = $majorRepo;
    }

    /**
     * Display a listing of the Major.
     *
     * @param MajorDataTable $majorDataTable
     * @return Response
     */
    public function index(MajorDataTable $majorDataTable)
    {
        return $majorDataTable->render('majors.index');
    }

    /**
     * Show the form for creating a new Major.
     *
     * @return Response
     */
    public function create()
    {
        $major = \App\Models\Major::all();
        

        return view('majors.create')
            ->with('', $major);
    }

    /**
     * Store a newly created Major in storage.
     *
     * @param CreateMajorRequest $request
     *
     * @return Response
     */
    public function store(CreateMajorRequest $request)
    {
        $input = $request->all();

        $major = $this->majorRepository->create($input);

        Flash::success('Major saved successfully.');
        return redirect(route('majors.index'));
    }

    /**
     * Display the specified Major.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $major = $this->majorRepository->findWithoutFail($id);

        if (empty($major)) {
            Flash::error('Major not found');
            return redirect(route('majors.index'));
        }

        return view('majors.show')->with('major', $major);
    }

    /**
     * Show the form for editing the specified Major.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $majors = \App\Models\Major::all();
        

        $major = $this->majorRepository->findWithoutFail($id);

        if (empty($major)) {
            Flash::error('Major not found');
            return redirect(route('majors.index'));
        }

        return view('majors.edit')
            ->with('major', $major)
            ->with('', $majors);
    }

    /**
     * Update the specified Major in storage.
     *
     * @param  int              $id
     * @param UpdateMajorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMajorRequest $request)
    {
        $major = $this->majorRepository->findWithoutFail($id);

        if (empty($major)) {
            Flash::error('Major not found');
            return redirect(route('majors.index'));
        }

        $input = $request->all();
        $major = $this->majorRepository->update($input, $id);

        Flash::success('Major updated successfully.');
        return redirect(route('majors.index'));
    }

    /**
     * Remove the specified Major from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $major = $this->majorRepository->findWithoutFail($id);

        if (empty($major)) {
            Flash::error('Major not found');
            return redirect(route('majors.index'));
        }

        $this->majorRepository->delete($id);

        Flash::success('Major deleted successfully.');
        return redirect(route('majors.index'));
    }

    /**
     * Store data Major from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $major = $this->majorRepository->create($item->toArray());
            });
        });

        Flash::success('Major saved successfully.');
        return redirect(route('majors.index'));
    }
}
