<?php

namespace App\Http\Controllers;

use App\DataTables\StudentGradeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStudentGradeRequest;
use App\Http\Requests\UpdateStudentGradeRequest;
use App\Repositories\StudentGradeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class StudentGradeController extends AppBaseController
{
    /** @var  StudentGradeRepository */
    private $studentGradeRepository;

    public function __construct(StudentGradeRepository $studentGradeRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:studentGrade-edit', ['only' => ['edit']]);
        $this->middleware('can:studentGrade-store', ['only' => ['store']]);
        $this->middleware('can:studentGrade-show', ['only' => ['show']]);
        $this->middleware('can:studentGrade-update', ['only' => ['update']]);
        $this->middleware('can:studentGrade-delete', ['only' => ['delete']]);
        $this->middleware('can:studentGrade-create', ['only' => ['create']]);
        $this->studentGradeRepository = $studentGradeRepo;
    }

    /**
     * Display a listing of the StudentGrade.
     *
     * @param StudentGradeDataTable $studentGradeDataTable
     * @return Response
     */
    public function index(StudentGradeDataTable $studentGradeDataTable)
    {
        return $studentGradeDataTable->render('student_grades.index');
    }

    /**
     * Show the form for creating a new StudentGrade.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        // $students = \App\Models\Student::all()->pluck('name', 'id');;
        $subjects = \App\Models\Subject::all()->pluck('name', 'id');;
        $classes = \App\Models\SchoolClass::all()->pluck('nama_kelas', 'id');;

         // Initialize the teachers variable
        $teachers = [];

        if ($user->hasRole('teacher')) {
            // If the user is a teacher, get only their own information
            $teachers[$user->id] = $user->nip . ' - ' . $user->name; // Assuming 'nip' and 'name' are attributes of the User model
        } else {
            // If the user is not a teacher, retrieve all teachers
            $teachers = \App\User::whereHas('roles', function ($q) {
                $q->where('name', 'teacher');
            })->select(\DB::raw("CONCAT(nip, ' - ', name) as full_name"), 'id')
            ->pluck('full_name', 'id');
        }
        $students = [];
        

        return view('student_grades.create')
            ->with('students', $students)
            ->with('subjects', $subjects)
            ->with('classes', $classes)
            ->with('teachers', $teachers);
    }

    /**
     * Store a newly created StudentGrade in storage.
     *
     * @param CreateStudentGradeRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentGradeRequest $request)
    {
        $input = $request->all();

        $studentGrade = $this->studentGradeRepository->create($input);

        Flash::success('Student Grade saved successfully.');
        return redirect(route('studentGrades.index'));
    }

    /**
     * Display the specified StudentGrade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studentGrade = $this->studentGradeRepository->findWithoutFail($id);

        if (empty($studentGrade)) {
            Flash::error('Student Grade not found');
            return redirect(route('studentGrades.index'));
        }

        return view('student_grades.show')->with('studentGrade', $studentGrade);
    }

    /**
     * Show the form for editing the specified StudentGrade.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $students = \App\Models\Student::select(\DB::raw("CONCAT(nisn, ' - ', name) as full_name"), 'id')->pluck('full_name', 'id');
        $subjects = \App\Models\Subject::all()->pluck('name', 'id');;
        $classes = \App\Models\SchoolClass::all()->pluck('nama_kelas', 'id');;
         // Initialize the teachers variable
        $teachers = [];

        if ($user->hasRole('teacher')) {
            // If the user is a teacher, get only their own information
            $teachers[$user->id] = $user->nip . ' - ' . $user->name; // Assuming 'nip' and 'name' are attributes of the User model
        } else {
            // If the user is not a teacher, retrieve all teachers
            $teachers = \App\User::whereHas('roles', function ($q) {
                $q->where('name', 'teacher');
            })->select(\DB::raw("CONCAT(nip, ' - ', name) as full_name"), 'id')
            ->pluck('full_name', 'id');
        }
        

        $studentGrade = $this->studentGradeRepository->findWithoutFail($id);

        if (empty($studentGrade)) {
            Flash::error('Student Grade not found');
            return redirect(route('studentGrades.index'));
        }

        return view('student_grades.edit')
            ->with('studentGrade', $studentGrade)
            ->with('students', $students)
            ->with('subjects', $subjects)
            ->with('teachers', $teachers)
            ->with('classes', $classes)
            ->with('user', $user);
    }

    /**
     * Update the specified StudentGrade in storage.
     *
     * @param  int              $id
     * @param UpdateStudentGradeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentGradeRequest $request)
    {
        $studentGrade = $this->studentGradeRepository->findWithoutFail($id);

        if (empty($studentGrade)) {
            Flash::error('Student Grade not found');
            return redirect(route('studentGrades.index'));
        }

        $input = $request->all();
        $studentGrade = $this->studentGradeRepository->update($input, $id);

        Flash::success('Student Grade updated successfully.');
        return redirect(route('studentGrades.index'));
    }

    /**
     * Remove the specified StudentGrade from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentGrade = $this->studentGradeRepository->findWithoutFail($id);

        if (empty($studentGrade)) {
            Flash::error('Student Grade not found');
            return redirect(route('studentGrades.index'));
        }

        $this->studentGradeRepository->delete($id);

        Flash::success('Student Grade deleted successfully.');
        return redirect(route('studentGrades.index'));
    }

    /**
     * Store data StudentGrade from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $studentGrade = $this->studentGradeRepository->create($item->toArray());
            });
        });

        Flash::success('Student Grade saved successfully.');
        return redirect(route('studentGrades.index'));
    }

    public function getStudentsByClass($classId)
    {
        // Fetch students based on the classId
        $students = \App\Models\Student::where('school_class_id', $classId)->select(\DB::raw("CONCAT(nisn, ' - ', name) as full_name"), 'id')->get()->toArray();
        
        // Return the students in JSON format
        return response()->json($students);
    }
}
