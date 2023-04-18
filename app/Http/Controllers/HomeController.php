<?php

namespace App\Http\Controllers;


use App\Models\City;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {


        $rooms = Room::with('reserved')->take(3)->get();
        // đếm tổng số phòng 
        $count_room = Room::count();
        return view('home.index', compact('rooms', 'count_room'));
    }
    public function show($id)
    {
        $room = Room::with('reserved')->find($id);
        return view('home.show', compact('room'));

        
        return view('home.index');
    }
    public function autocomplete(Request $request): JsonResponse
    {
        $data = [];

        if ($request->filled('q')) {
            $data = City::select("city_name", "id")
                ->where('city_name', 'LIKE', '%' . $request->get('q') . '%')
                ->get();
        }

        return response()->json($data);
    }
}
