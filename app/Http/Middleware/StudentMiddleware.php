<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = 'prospective_students'): Response
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login-student'); // Redirect to the login page if not authenticated
        }

        return $next($request); // Proceed with the request if authenticated
    }
}
