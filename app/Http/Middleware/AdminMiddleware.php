<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd('Testing');
        // Check if the user is authenticated via the 'student' guard or 'web' guard
        $user = Auth::guard('prospective_students')->user();
        $admin = Auth::guard('web')->user();

        if ($admin instanceof \App\User) {
            // Handle as admin
            return $next($request); // Allow the request to proceed
        }

        if ($user instanceof \App\Models\Student) {
            // You can redirect or block the request for students
            return redirect('/');
        }

        // If neither, redirect to login
        return redirect('/');
    }

}
