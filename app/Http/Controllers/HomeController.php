<?php

namespace App\Http\Controllers;


use App\Models\City;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    public function index()
    {


        $rooms = Room::with('reserved')->take(3)->get();
        // đếm tổng số phòng 
        $count_room = Room::count();
        $cities = City::all();
        return view('home.index', compact('rooms', 'count_room','cities'));
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
    public function search(Request $request)
    {
        $city_id = $request->get('city_name');
        $rooms = Room::with('hotel.city', 'reserved')->whereHas('hotel.city', function ($query) use ($city_id) {
            $query->where('id', $city_id);
        })->get();
        $count = $rooms->count();
        return view('search', compact('rooms', 'count'));
    }
}
