<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\PostController as ControllersPostController;

Route::get('/', function () {
               return view('admin.layouts.master');
})->name('welcome');

Route::group(
               [
                              'as' => 'users.',
                              'prefix' => 'users',
               ],
               function () {
                              Route::get('/', [UsersController::class, 'index'])->name('index');
                              // Route::get('/{user}', [UserController::class, 'show'])->name('show');
                              // Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
               },
);
Route::group(
               [
                              'as' => 'booking.',
                              'prefix' => 'booking',
               ],
               function () {
                              Route::get('/', [BookingController::class, 'index'])->name('index');
                              // Route::get('/{post}', [PostController::class, 'show'])->name('show');
                              // Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
               },
);
Route::group(
               [
                              'as' => 'room.',
                              'prefix' => 'room',
               ],
               function () {
                              Route::get('/', [RoomController::class, 'index'])->name('index');
                              // Route::get('/{post}', [PostController::class, 'show'])->name('show');
                              // Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
               },
);