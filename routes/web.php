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
Route::get('/room', [RoomController::class, 'index'])->name('room.index');
Route::get('/room/{id}', [RoomController::class, 'show'])->name('room.show');
Route::get('/city/{id}', [HomeController::class, 'city_room'])->name('city.room');

Auth::routes();
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/booking/{id}', [RoomController::class, 'booking'])->name('room.booking');
Route::post('/booking/{id}', [RoomController::class, 'booking_store'])->name('room.booking.store');
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact.index');
Route::get('/about', function () {
    return view('about.index');
})->name('about.index');
Route::get('/service' , function () {
    return view('service.index');
})->name('service.index');
Route::get('/admin/users',function(){
    return view('admin.users.index');
})->name('admin.users.index');