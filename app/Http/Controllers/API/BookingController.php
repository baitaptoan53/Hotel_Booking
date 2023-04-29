<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Booking as ResourcesBooking;
use App\Http\Resources\User;
use App\Models\Reservation;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class BookingController extends BaseController
{
    public function index()
    {
        $data = Reservation::with('user')->get();
        dd($data);
        return $this->sendResponse(ResourcesBooking::collection($data), 'Posts fetched.');
    }
}
