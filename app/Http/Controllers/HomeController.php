<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // lấy ra 5 phòng đầu tiên trong bảng rooms
        $rooms = Room::take(5)->get();

        return view('home.index', compact('rooms'));
    }
}
