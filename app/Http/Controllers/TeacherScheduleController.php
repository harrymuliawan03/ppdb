<?php

namespace App\Http\Controllers;

use App\DataTables\TeacherScheduleDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTeacherScheduleRequest;
use App\Http\Requests\UpdateTeacherScheduleRequest;
use App\Repositories\TeacherScheduleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class TeacherScheduleController extends AppBaseController
{
    /** @var  TeacherScheduleRepository */
    private $teacherScheduleRepository;

    public function __construct(TeacherScheduleRepository $teacherScheduleRepo)
    {
        $this->middleware('auth');
        $this->middleware('can:teacherSchedule-edit', ['only' => ['edit']]);
        $this->middleware('can:teacherSchedule-store', ['only' => ['store']]);
        $this->middleware('can:teacherSchedule-show', ['only' => ['show']]);
        $this->middleware('can:teacherSchedule-update', ['only' => ['update']]);
        $this->middleware('can:teacherSchedule-delete', ['only' => ['delete']]);
        $this->middleware('can:teacherSchedule-create', ['only' => ['create']]);
        $this->teacherScheduleRepository = $teacherScheduleRepo;
    }

    /**
     * Display a listing of the TeacherSchedule.
     *
     * @param TeacherScheduleDataTable $teacherScheduleDataTable
     * @return Response
     */
    public function index(TeacherScheduleDataTable $teacherScheduleDataTable)
    {
        return $teacherScheduleDataTable->render('teacher_schedules.index');
    }

    /**
     * Show the form for creating a new TeacherSchedule.
     *
     * @return Response
     */
    public function create()
    {
        $schoolClass = \App\Models\SchoolClass::all()->pluck('nama_kelas', 'id');
        $subject = \App\Models\Subject::all()->pluck('name', 'id');
        $teacher = \App\User::whereHas('roles', function($q) {
            $q->where('name', 'teacher');
        })->select(\DB::raw("CONCAT(nip, ' - ', name) as full_name"), 'id')->pluck('full_name', 'id');
        

        return view('teacher_schedules.create')
            ->with('schoolClass', $schoolClass)
            ->with('subject', $subject)
            ->with('teacher', $teacher);
    }

    /**
     * Store a newly created TeacherSchedule in storage.
     *
     * @param CreateTeacherScheduleRequest $request
     *
     * @return Response
     */
    public function store(CreateTeacherScheduleRequest $request)
    {
        $input = $request->all();

        $teacherSchedule = $this->teacherScheduleRepository->create($input);

        Flash::success('Teacher Schedule saved successfully.');
        return redirect(route('teacherSchedules.index'));
    }

    /**
     * Display the specified TeacherSchedule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teacherSchedule = $this->teacherScheduleRepository->findWithoutFail($id);

        if (empty($teacherSchedule)) {
            Flash::error('Teacher Schedule not found');
            return redirect(route('teacherSchedules.index'));
        }

        return view('teacher_schedules.show')->with('teacherSchedule', $teacherSchedule);
    }

    /**
     * Show the form for editing the specified TeacherSchedule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $schoolClass = \App\Models\SchoolClass::all()->pluck('nama_kelas', 'id');
        $subject = \App\Models\Subject::all()->pluck('name', 'id');
        $teacher = \App\User::whereHas('roles', function($q) {
            $q->where('name', 'teacher');
        })->select(\DB::raw("CONCAT(nip, ' - ', name) as full_name"), 'id')->pluck('full_name', 'id');
        

        $teacherSchedule = $this->teacherScheduleRepository->findWithoutFail($id);

        if (empty($teacherSchedule)) {
            Flash::error('Teacher Schedule not found');
            return redirect(route('teacherSchedules.index'));
        }

        return view('teacher_schedules.edit')
            ->with('teacherSchedule', $teacherSchedule)
            ->with('schoolClass', $schoolClass)
            ->with('subject', $subject)
            ->with('teacher', $teacher);
    }

    /**
     * Update the specified TeacherSchedule in storage.
     *
     * @param  int              $id
     * @param UpdateTeacherScheduleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeacherScheduleRequest $request)
    {
        $teacherSchedule = $this->teacherScheduleRepository->findWithoutFail($id);

        if (empty($teacherSchedule)) {
            Flash::error('Teacher Schedule not found');
            return redirect(route('teacherSchedules.index'));
        }

        $input = $request->all();
        $teacherSchedule = $this->teacherScheduleRepository->update($input, $id);

        Flash::success('Teacher Schedule updated successfully.');
        return redirect(route('teacherSchedules.index'));
    }

    /**
     * Remove the specified TeacherSchedule from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teacherSchedule = $this->teacherScheduleRepository->findWithoutFail($id);

        if (empty($teacherSchedule)) {
            Flash::error('Teacher Schedule not found');
            return redirect(route('teacherSchedules.index'));
        }

        $this->teacherScheduleRepository->delete($id);

        Flash::success('Teacher Schedule deleted successfully.');
        return redirect(route('teacherSchedules.index'));
    }

    /**
     * Store data TeacherSchedule from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $teacherSchedule = $this->teacherScheduleRepository->create($item->toArray());
            });
        });

        Flash::success('Teacher Schedule saved successfully.');
        return redirect(route('teacherSchedules.index'));
    }
}
