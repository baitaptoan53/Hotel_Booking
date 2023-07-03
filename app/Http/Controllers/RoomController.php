<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('reserved', 'hotel.company')->paginate(9);
        // phân trang paginate 
        return view('room.index', compact('rooms'));
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
    public function show($id)
    {
        $room = Room::with('hotel.company', 'reserved', 'roomType')->find($id);
        $comments = Comment::where('room_id', $room->id)->orderBy('created_at', 'desc')->get();
        return view('room.show', compact('room', 'comments'));
    }
    public function booking($id)
    {
        $room = Room::with('hotel.company')->find($id);
        return view('booking.index', compact('room'));
    }
    public function booking_store(Request $request,  $id)
    {
        $room = Room::with('hotel.company', 'reserved')->find($id);
        $end_date = $request->input('end_date');
        $start_date = $request->input('start_date');
        $end_date = date('Y-m-d H:i:s', strtotime($end_date));
        $start_date = date('Y-m-d H:i:s', strtotime($start_date));
        $days = (strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24);
        if ($days > 0) {
            $decimalPart = $days - floor($days); // Lấy phần thập phân

            if ($decimalPart > 0 && $decimalPart < 0.5) {
                $days = ceil($days * 2) / 2; // Làm tròn lên 1.5 nếu phần thập phân lớn hơn 0 và nhỏ hơn 0.5
            } elseif ($decimalPart >= 0.5 && $decimalPart < 0.9) {
                $days = ceil($days); // Làm tròn lên 1 nếu phần thập phân lớn hơn hoặc bằng 0.5 và nhỏ hơn 0.9
            } else {
                $days = ceil($days); // Làm tròn lên nếu không thỏa điều kiện nào
            }
        }
        // lấy giá phòng theo ngày tại bảng room_reserved
        $price = $room->reserved->price * $days;
        $discount_percent = 0;
        $room_reserved_id = $room->reserved->id;
        $user_id = Auth::id();
        $reservation = new Reservation();
        $reservation->users_id = $user_id;
        $reservation->room_reserved_id = $room_reserved_id;
        $reservation->check_in = $start_date;
        $reservation->check_out = $end_date;
        $reservation->total_price = $price;
        $reservation->discount_percent = $discount_percent;
        $reservation->save();
        return redirect()->route('booking.success')->with([
            'room_id' => $room->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'total_price' => $price,
        ]);
    }
    public function booking_success()
    {
        $roomId = session('room_id');
        $startDate = session('start_date');
        $endDate = session('end_date');
        $price = session('total_price');
        // Lấy các thông tin khác từ session
        // Gửi thông tin cho view
        return view('booking.success', [
            'roomId' => $roomId,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'price' => $price,
        ]);
    }
    public function select2_hotel(Request $request): JsonResponse
    {
        $data = [];

        if ($request->filled('q')) {
            $data = Hotel::select("hotel_name", "id")
                ->where('hotel_name', 'LIKE', '%' . $request->get('q') . '%')
                ->get();
        }
        return response()->json($data);
    }
    public function select2_room_type(Request $request): JsonResponse
    {
        $data = [];

        if ($request->filled('q')) {
            $data = Roomtype::select("room_type_name", "id")
                ->where('room_type_name', 'LIKE', '%' . $request->get('q') . '%')
                ->get();
        }
        return response()->json($data);
    }
}
