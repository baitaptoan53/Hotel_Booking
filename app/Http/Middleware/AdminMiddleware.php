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
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if ( Auth::user()->role == 'admin') {
            // Người dùng đã đăng nhập, cho phép tiếp tục xử lý yêu cầu
            return $next($request);
        } else {
            // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect('/login');
        }
    }
}
