<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'index'])->name('home.index');

Route::get('/booking', function () {
    return view('booking.index');
});

Route::get('/contact', function () {
    return view('contact.index');
});

Route::get('/room', function () {
    return view('room.index');
});