<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $rooms = Room::with('reserved')->take(3)->get();

        return view('home.index', compact('rooms'));
    }
    public function show($id)
    {
        $room = Room::with('reserved')->find($id);
        return view('home.show', compact('room'));
    }
}
