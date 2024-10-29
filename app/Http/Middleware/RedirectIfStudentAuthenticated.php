<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfStudentAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            // Redirect the student to the homepage if they are logged in
            return redirect('/');
        }
        // Check if the user is authenticated as a student
        if (Auth::guard('prospective_students')->check()) {
            // Redirect the student to the homepage if they are logged in
            return redirect('/');
        }

        // Otherwise, allow the request to proceed
        return $next($request);
    }
}
