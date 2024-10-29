<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\ProspectiveStudent;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PpdbController extends Controller
{
    public function index()
    {
        return view('website/pages/ppdb');
    }

    public function showFormRegisterPpdb()
    {
        // Assuming the authenticated user can be retrieved via Auth facade
        $prospective_student = Auth::guard('prospective_students')->user();

        // Check if the user already has a registration
        $registration = Registration::where('prospective_student_id', $prospective_student->id)->first();

        $majors = Major::all();

        if ($registration) {
            // If the user has already registered, redirect them to the already registered page
            return view('website.pages.ppdb_already_registered', compact('registration'));
        }

        // If not registered, show the registration form
        return view('website.pages.ppdb_register', compact('prospective_student', 'majors'));
    }

    public function registration(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:200',
            'nisn' => 'numeric|digits_between:10,12', // Assuming NISN has 10-12 digits
            'birth_date' => 'required|date',
            'phone_number' => 'required|numeric|digits_between:10,15', // Assuming phone numbers are 10-15 digits
            'address' => 'required', // Assuming phone numbers are 10-15 digits
            'gender' => 'required|in:male,female,other',

            'ijazah' => 'required|mimes:jpeg,png,jpg,pdf|max:2048', // must be an image or pdf
            'raport' => 'required|mimes:jpeg,png,jpg,pdf|max:2048', // must be an image or pdf
            'birth_certificate' => 'required|mimes:jpeg,png,jpg,pdf|max:2048', // must be an image or pdf
            'major' => 'required|numeric|exists:majors,id',
            'student_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048', // must be an image
            'old_school' => 'required', // must be an image
            'average_ijazah' => 'required|numeric', // must be an image
            'average_raport' => 'required|numeric', // must be an image
        ]);

        $checkIfAlreadyRegistered = Registration::where('prospective_student_id', Auth::guard('prospective_students')->user()->id)->first();
        if ($checkIfAlreadyRegistered) {
            return redirect('/ppdb')->with('error', 'Anda sudah terdaftar!');
        }
        // Retrieve the authenticated prospective student
        $prospective_student = ProspectiveStudent::where('id', Auth::guard('prospective_students')->user()->id)->first();

        // Update prospective student details if changed
        $prospective_student->update([
            'name' => $request->input('name'),
            'nisn' => $request->input('nisn'),
            'birth_date' => $request->input('birth_date'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
        ]);

        // Store the files and get their paths
        $ijazahPath = $request->file('ijazah')->store('ijazah', 'public');
        $raportPath = $request->file('raport')->store('raport', 'public');
        $birthCertificatePath = $request->file('birth_certificate')->store('birth_certificate', 'public');
        $studentPhotoPath = $request->file('student_photo')->store('student_photos', 'public');

        // Save registration data
        $registration = new Registration();
        do {
            $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number
            $no_registration = 'REG-' . now()->year . '-' . $randomNumber;
        } while (Registration::where('no_registration', $no_registration)->exists()); // Check if already exists

        $registration->no_registration = $no_registration;
        $registration->prospective_student_id = Auth::guard('prospective_students')->user()->id; // Assuming the user is authenticated
        $registration->ijazah = $ijazahPath;
        $registration->raport = $raportPath;
        $registration->birth_certificate = $birthCertificatePath;
        $registration->student_photo = $studentPhotoPath;
        $registration->registration_date = now();
        $registration->status = 'pending'; // Default status
        $registration->major_id = $request->input('major');
        $registration->old_school = $request->input('old_school');
        $registration->average_ijazah = $request->input('average_ijazah');
        $registration->average_raport = $request->input('average_raport');
        $registration->save();

        return view('website.pages.ppdb_already_registered', compact('registration'));
    }

    public function announcement()
    {
        // Assuming the authenticated user can be retrieved via Auth facade
        $prospective_student = Auth::guard('prospective_students')->user();

        // Check if the user already has a registration
        $registration = Registration::where('prospective_student_id', $prospective_student->id)->first();

        if ($registration) {
            if ($registration->status === 'approved') {
                // Jika diterima
                return view('website.pages.ppdb_accepted', compact('registration'));
            } elseif ($registration->status === 'rejected') {
                // Jika tidak diterima
                return view('website.pages.ppdb_not_accepted', compact('registration'));
            } else {
                // Status pending
                return view('website.pages.ppdb_no_announcement', compact('registration'));
            }
        }

        // If not registered, show the registration form
        return view('website.pages.ppdb_register', compact('prospective_student'));
    }
}
