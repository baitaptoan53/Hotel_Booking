<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
