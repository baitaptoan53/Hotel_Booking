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
        $data = Reservation::with('user','room_reserved.room')->paginate(10);
        $pagination = $data->toArray();
        $data = [
            'data' => ResourcesBooking::collection($data),
            'links' => [
                'first' => $pagination['first_page_url'],
                'last' => $pagination['last_page_url'],
                'prev' => $pagination['prev_page_url'],
                'next' => $pagination['next_page_url'],
            ],
            'meta' => [
                'current_page' => $pagination['current_page'],
                'from' => $pagination['from'],
                'last_page' => $pagination['last_page'],
                'links' => $pagination['links']
            ]
        ];
        return $this->sendResponse($data, 'Bookings retrieved successfully.');
    }
}
