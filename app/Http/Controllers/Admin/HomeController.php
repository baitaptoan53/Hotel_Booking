<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // đếm số lượng người dùng đặt phòng trong tháng hiện tại 
        $users = DB::table('users')
            ->join('reservation', 'users.id', '=', 'reservation.users_id')
            ->whereMonth('reservation.check_in', date('m'))
            ->count();
        // đếm số lượng người dùng đặt phòng trong 1 tháng trước
        $users_last_month = DB::table('users')
            ->join('reservation', 'users.id', '=', 'reservation.users_id')
            ->whereMonth('reservation.check_in', date('m') - 1)
            ->count();
        $calc_users = $users - $users_last_month;
        // đếm số lượng phòng đã đặt trong tháng hiện tại
        $room_booking = Reservation::whereMonth('check_in', date('m'))->count();
        $room_booking_last_month = Reservation::whereMonth('check_in', date('m') - 1)->count();
        $calc_room_booking = $room_booking - $room_booking_last_month;
        // tính tổng số tiền thu được trong tháng hiện tại
        $total_price = Reservation::whereMonth('check_in', date('m'))->sum('total_price');
        $total_price_last_month = Reservation::whereMonth('check_in', date('m') - 1)->sum('total_price');
        $calc_total_price = $total_price - $total_price_last_month;
        // tính tổng số phòng đã tạo trong tháng hiện tại
        $total_room = DB::table('room')->whereMonth('created_at', date('m'))->count();
        $total_room_last_month = DB::table('room')->whereMonth('created_at', date('m') - 1)->count();
        $calc_total_room = $total_room - $total_room_last_month;
        return view('admin.home.index', compact(
            'users',
            'calc_users',
            'users_last_month',
            'room_booking',
            'calc_room_booking',
            'room_booking_last_month',
            'total_price',
            'calc_total_price',
            'total_price_last_month',
            'total_room',
            'calc_total_room',
            'total_room_last_month'
        ));
    }
}
