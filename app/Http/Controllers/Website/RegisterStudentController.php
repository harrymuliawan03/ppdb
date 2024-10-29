<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ProspectiveStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterStudentController extends Controller
{
    public function showFormRegister()
    {
        return view('website.pages.register_student');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email|unique:prospective_students,email|unique:students,email',
            'nisn' => 'required|numeric|digits_between:10,12|unique:prospective_students,nisn|unique:students,nisn', // Assuming NISN has 10-12 digits
            'birth_date' => 'required|date',
            'phone_number' => 'required|numeric|digits_between:10,15', // Assuming phone numbers are 10-15 digits
            'address' => 'required', // Assuming phone numbers are 10-15 digits
            'gender' => 'required|in:male,female,other',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the student record
        ProspectiveStudent::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'nisn' => $request->input('nisn'),
            'birth_date' => $request->input('birth_date'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'password' => Hash::make($request->input('password')), // Encrypt the password
        ]);

        return redirect('/login-student')->with('success', 'Anda berhasil membuat akun, silahkan login');
    }
}
