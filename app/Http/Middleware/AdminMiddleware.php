<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect('/login'); // Redirect to login if not authenticated
        }

        // Check if the authenticated user has the 'admin' role
        if (auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'You do not have admin access.'); // Redirect with an error message
        }

        // Allow the request to proceed
        return $next($request);
    }
}
