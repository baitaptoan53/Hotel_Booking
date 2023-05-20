<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RoomExport;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room.index');
    }
    public function create()
    {
        return view('admin.room.create');
    }
    public function edit($id)
    {
        $room = Room::find($id);
        return view('admin.room.edit', compact('room'));
    }
    public function export()
    {
        return Excel::download(new RoomExport, 'room.xlsx');
    }
}
