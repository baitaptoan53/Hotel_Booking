<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('admin.city.index');
    }
    public function create()
    {
        return view('admin.city.create');
    }
    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.city.edit', compact('city'));
    }
}
