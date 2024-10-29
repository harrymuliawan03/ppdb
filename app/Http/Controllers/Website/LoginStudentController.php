<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ProspectiveStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginStudentController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('website.pages.login_student'); // Load the login form view
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        // Attempt to authenticate the student
        $student = ProspectiveStudent::where('email', $request->input('email'))->first();
    
        if ($student && Hash::check($request->input('password'), $student->password)) {
            // Log the student in using the 'student' guard
            Auth::guard('prospective_students')->login($student);
            
            // Redirect to a specific page after login
            return redirect('/')->with('success', 'Login successful');
        } else {
            // Redirect back with an error message if credentials are incorrect
            return back()->withErrors(['email' => 'Email / Password salah']);
        }
    }
    
}
