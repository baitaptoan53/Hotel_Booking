<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Resources\Room as ResourcesRoom;
use App\Models\RoomReserved;
use Illuminate\Http\Request;

class RoomController extends BaseController
{
    public function index()
    {
        $data = Room::with('reserved', 'hotel.company')->get();
        return $this->sendResponse(ResourcesRoom::collection($data), 'Posts fetched.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'description' => 'required',
            'rate' => 'required',
            'hotel_id' => 'required',
            'room_type_id' => 'required',
            'current_price' => 'required',
            'price' => 'required',
        ]);

        $room = new Room();
        $room->room_name = $request->input('room_name');
        $room->description = $request->input('description');
        $room->rate = $request->input('rate');
        $room->hotel_id = $request->input('hotel_id');
        $room->room_type_id = $request->input('room_type_id');
        $room->current_price = $request->input('current_price');
        // lưu ảnh vào thư mục public/img và lấy tên ảnh để lưu vào cơ sở dữ liệu
        // $file = $request->file('photo');
        // $file->move('img', $file->getClientOriginalName());
        // $room->photo = $file->getClientOriginalName();
        $room->save();

        $room_id = $room->id;
        $room_reserved = new RoomReserved();
        $room_reserved->room_id = $room_id;
        $room_reserved->price = $request->input('price');
        $room_reserved->save();

        return response()->json([
            'success' => true,
            'message' => 'Room created successfully',
            'data' => $room
        ], 201);
    }
}
