<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('reserved','hotel.company')->paginate(9);
        // phân trang paginate 
        return view('room.index',compact('rooms'));
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