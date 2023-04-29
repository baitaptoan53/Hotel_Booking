<?php

use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users',[UsersController::class, 'index'])->name('users');
Route::delete('users/{id}', [UsersController::class, 'destroy']);

Route::get('/booking',[BookingController::class, 'index'])->name('booking');
Route::get('/room', [RoomController::class, 'index'])->name('room');