<?php

namespace App\Http\Controllers\Webcore;

use App\DataTables\StudentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Repositories\StudentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\SchoolClass;
use App\Models\SppPayment;
use App\Models\Student;
use Carbon\Carbon;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class StudentController extends AppBaseController
{
    /** @var  StudentRepository */
    private $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:student-edit', ['only' => ['edit']]);
        $this->middleware('can:student-store', ['only' => ['store']]);
        $this->middleware('can:student-show', ['only' => ['show']]);
        $this->middleware('can:student-update', ['only' => ['update']]);
        $this->middleware('can:student-delete', ['only' => ['delete']]);
        $this->middleware('can:student-create', ['only' => ['create']]);
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the Student.
     *
     * @param StudentDataTable $studentDataTable
     * @return Response
     */
    public function index(StudentDataTable $studentDataTable)
    {
        return $studentDataTable->render('students.index');
    }

    /**
     * Show the form for creating a new Student.
     *
     * @return Response
     */
    public function create()
    {
        $students = \App\Models\Student::all();
        $school_classes = SchoolClass::all()->pluck('nama_kelas', 'id')->prepend('Pilih Kelas', '');
        

        return view('students.create')
            ->with('school_classes', $school_classes)
            ->with('', $students);
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param CreateStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();

        $currentMonth = Carbon::now()->startOfMonth(); // Get the start of the current month
        
        $student = $this->studentRepository->create($input);

        SppPayment::create([
            'student_id' => $student->id,
            'payment_month' => $currentMonth,
            'amount' => 200000, // Example SPP amount
            'status' => 'pending',
        ]);
        
        Flash::success('Student saved successfully.');
        return redirect(route('students.index'));
    }

    /**
     * Display the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');
            return redirect(route('students.index'));
        }

        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
        $students = \App\Models\Student::all();
        

        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');
            return redirect(route('students.index'));
        }

        $school_classes = SchoolClass::all()->pluck('nama_kelas', 'id')->prepend('Pilih Kelas', '');

        return view('students.edit')
            ->with('student', $student)
            ->with('school_classes', $school_classes)
            ->with('', $students);
    }

    /**
     * Update the specified Student in storage.
     *
     * @param  int              $id
     * @param UpdateStudentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentRequest $request)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');
            return redirect(route('students.index'));
        }

        $input = $request->all();
        $student = $this->studentRepository->update($input, $id);

        Flash::success('Student updated successfully.');
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified Student from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');
            return redirect(route('students.index'));
        }

        $this->studentRepository->delete($id);

        Flash::success('Student deleted successfully.');
        return redirect(route('students.index'));
    }

    /**
     * Store data Student from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $student = $this->studentRepository->create($item->toArray());
            });
        });

        Flash::success('Student saved successfully.');
        return redirect(route('students.index'));
    }

    public function getStudentsByClass($classId)
    {
        $students = Student::where('class_id', $classId)->pluck('name', 'id');
        return response()->json($students);
    }
}
