<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingExport;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.booking.index');
    }
    public function export()
    {
        return Excel::download(new BookingExport, 'booking.xlsx');
    }
    
}
