<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SearchController;
use App\Models\Room;
use App\Models\RoomReserved;
use Illuminate\Support\Facades\Auth;
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


Route::get('/booking', function () {
    return view('booking.index');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');

    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('/room', [RoomController::class, 'index']);
Route::get('/room/{id}', [RoomController::class, 'show'])->name('room.show');

Auth::routes();
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/test', function () {
        $room = Room::with('hotel.company')->find(1);
    return view('room.show', compact('room'));
});
Route::get('/booking/{id}', [RoomController::class, 'booking'])->name('room.booking');
Route::post('/booking/{id}', [RoomController::class, 'booking_store'])->name('room.booking.store');