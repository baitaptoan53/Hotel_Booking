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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the 'admin' role
        if ($request->user() && $request->user()->role === 'admin') {
            return redirect()->route('admin.welcome');
        }

        // If not authorized, redirect to a specific route or return a response accordingly
        return redirect()->route('home.index')->with('error', 'Unauthorized access');
    }
}
