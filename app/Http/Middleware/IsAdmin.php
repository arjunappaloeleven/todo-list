<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the 'admin' role
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // Allow access to the next request
        }

        // If the user is not an admin, redirect them to a different page
        return redirect()->route('home')->with('error', 'You do not have admin access.');
    }
}
