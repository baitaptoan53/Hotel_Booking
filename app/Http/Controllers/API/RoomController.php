<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Resources\Room as ResourcesRoom;

use Illuminate\Http\Request;

class RoomController extends BaseController
{
    public function index()
    {
        $data = Room::with('reserved', 'hotel.company')->get();
        return $this->sendResponse(ResourcesRoom::collection($data), 'Posts fetched.');
    }
}
