<?php

namespace App\Http\Controllers\Webcore;

use App\DataTables\RegistrationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Repositories\RegistrationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\SppPayment;
use App\Models\Student;
use Carbon\Carbon;
use Response;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 
use Maatwebsite\Excel\Facades\Excel; 

class RegistrationController extends AppBaseController
{
    /** @var  RegistrationRepository */
    private $registrationRepository;

    public function __construct(RegistrationRepository $registrationRepo)
    {
        // $this->middleware('auth');
        $this->middleware('can:registration-edit', ['only' => ['edit']]);
        $this->middleware('can:registration-store', ['only' => ['store']]);
        $this->middleware('can:registration-show', ['only' => ['show']]);
        $this->middleware('can:registration-update', ['only' => ['update']]);
        $this->middleware('can:registration-delete', ['only' => ['delete']]);
        $this->middleware('can:registration-create', ['only' => ['create']]);
        $this->registrationRepository = $registrationRepo;
    }

    /**
     * Display a listing of the Registration.
     *
     * @param RegistrationDataTable $registrationDataTable
     * @return Response
     */
    public function index(RegistrationDataTable $registrationDataTable)
    {
        return $registrationDataTable->render('registrations.index');
    }

    public function indexSuccess(RegistrationDataTable $registrationDataTable)
    {
        $registrationDataTable->setDiterima(true);
        return $registrationDataTable->render('registrations-success.index');
    }

    /**
     * Show the form for creating a new Registration.
     *
     * @return Response
     */
    public function create()
    {
        $prospectiveStudent = \App\Models\ProspectiveStudent::all();
        $registrations = \App\Models\Registration::all();
        

        return view('registrations.create')
            ->with('prospective_student', $prospectiveStudent)
            ->with('', $registrations);
    }

    /**
     * Store a newly created Registration in storage.
     *
     * @param CreateRegistrationRequest $request
     *
     * @return Response
     */
    public function store(CreateRegistrationRequest $request)
    {
        $input = $request->all();

        $registration = $this->registrationRepository->create($input);

        Flash::success('Registration saved successfully.');
        return redirect(route('registrations.index'));
    }

    /**
     * Display the specified Registration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $registration = $this->registrationRepository->findWithoutFail($id);

        if (empty($registration)) {
            Flash::error('Registration not found');
            return redirect(route('registrations.index'));
        }

        return view('registrations.show')->with('registration', $registration);
    }

    /**
     * Show the form for editing the specified Registration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        
       $prospective_student = \App\Models\ProspectiveStudent::all();
        $registrations = \App\Models\Registration::all();
        

        $registration = $this->registrationRepository->findWithoutFail($id);

        if (empty($registration)) {
            Flash::error('Registration not found');
            return redirect(route('registrations.index'));
        }

        return view('registrations.edit')
            ->with('registration', $registration)
            ->with('prospective_student',$prospective_student)
            ->with('', $registrations);
    }

    /**
     * Update the specified Registration in storage.
     *
     * @param  int              $id
     * @param UpdateRegistrationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegistrationRequest $request)
{
    // Find the registration record
    $registration = $this->registrationRepository->with('prospective_student')->findWithoutFail($id);


    if (empty($registration)) {
        Flash::error('Registration not found');
        return redirect(route('registrations.index'));
    }

    // Get all input data
    $input = $request->all();

    // Handle file uploads if files are being uploaded
    if ($request->hasFile('ijazah')) {
        // Store the file and get the path (you should define your own method to handle file storage)
        $input['ijazah'] = $request->file('ijazah')->store('ijazah', 'public'); // Update the storage path as needed
    }

    if ($request->hasFile('raport')) {
        $input['raport'] = $request->file('raport')->store('raport', 'public');
    }

    if ($request->hasFile('birth_certificate')) {
        $input['birth_certificate'] = $request->file('birth_certificate')->store('birth_certificates', 'public');
    }

    if ($request->hasFile('student_photo')) {
        $input['student_photo'] = $request->file('student_photo')->store('student_photos', 'public');
    }

    if($input['status'] == 'success' && $registration->status != 'success') {
        $currentMonth = Carbon::now()->startOfMonth(); // Get the start of the current month

        $student = Student::create([
        'name' => $registration->prospective_student->name,
        'email' => $registration->prospective_student->email,
        'nisn' => $registration->prospective_student->nisn,
        'gender' => $registration->prospective_student->gender,
        'address' => $registration->prospective_student->address,
        'phone_number' => $registration->prospective_student->phone_number,
        'birth_date' => $registration->prospective_student->birth_date,
    ]);

        SppPayment::create([
            'student_id' => $student->id,
            'payment_month' => $currentMonth,
            'amount' => 200000,
            'status' => 'pending',
        ]);
    }
    
    // Update the registration record with the input data
    $registration = $this->registrationRepository->update($input, $id);


    Flash::success('Registration updated successfully.');
    return redirect(route('registrations.index'));
}


    /**
     * Remove the specified Registration from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $registration = $this->registrationRepository->findWithoutFail($id);

        if (empty($registration)) {
            Flash::error('Registration not found');
            return redirect(route('registrations.index'));
        }

        $this->registrationRepository->delete($id);

        Flash::success('Registration deleted successfully.');
        return redirect(route('registrations.index'));
    }

    /**
     * Store data Registration from an excel file in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function import(Request $request)
    {
        Excel::load($request->file('file'), function($reader) {
            $reader->each(function ($item) {
                $registration = $this->registrationRepository->create($item->toArray());
            });
        });

        Flash::success('Registration saved successfully.');
        return redirect(route('registrations.index'));
    }
}
