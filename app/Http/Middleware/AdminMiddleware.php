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
        // if (auth()->user()->role == 'admin') {
        //     return $next($request);
        // } else {
        //     return redirect()->route('login');
        // }
        //kiểm tra xem user đã đăng nhập chưa 
        if (auth()->check()) {
            //kiểm tra xem user có phải là admin hay không
            if (auth()->user()->role == 'admin') {
                return $next($request);
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }

    }
}
