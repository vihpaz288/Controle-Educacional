<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateStudents
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('students')->check()) {
            return redirect()->route('login.students');
        }
        return $next($request);
    }
}
