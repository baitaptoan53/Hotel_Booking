<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SearchController;
use App\Models\RoomReserved;
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
