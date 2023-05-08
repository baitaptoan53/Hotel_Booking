<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

class CustomMiddleware extends Controller
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->role == 'admin'){
            return $next($request);
        }
        return redirect()->route('home.index')->with('msg','No admin');
    }
}
