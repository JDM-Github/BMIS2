<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->status == false) {
            flash()->success('Wait For the Admin to Review your account');

            // Log the user out
            Auth::logout();
            
            // Redirect to the login page with a message
            return redirect()->route('login');
        }

        return $next($request);
    }
}
