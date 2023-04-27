<?php

namespace App\Http\Controllers;


use App\Models\City;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        })->paginate(9);

        $count = Room::whereHas('hotel.city', function ($query) use ($city_id) {
            $query->where('id', $city_id);
        })->count();
        return view('search', compact('rooms', 'count'));
    }
    public function city_room($id)
    {
        $rooms = Room::with('hotel.city', 'reserved')->whereHas('hotel.city', function ($query) use ($id) {
            $query->where('id', $id);
        })->paginate(9);
        $count = Room::whereHas('hotel.city', function ($query) use ($id) {
            $query->where('id', $id);
        })->count();
        return view('search', compact('rooms', 'count'));
    }
}