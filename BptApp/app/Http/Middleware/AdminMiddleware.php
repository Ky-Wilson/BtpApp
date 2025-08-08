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
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                // Allow access to admin routes
                return $next($request);
            } else {
                // Redirect or abort if the user is not an admin
                return redirect('/home')->with('error', 'You do not have admin access.');
            }
        }
        else{
            // If the user is not authenticated, redirect to login or home
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }
    }
}
