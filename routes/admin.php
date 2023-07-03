<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Models\User;
use Illuminate\Http\Request;

Route::group(
               [
                              'middleware' => ['admin'],

               ],
               function () {
                              Route::get('/', [HomeController::class, 'index'])->name('welcome');
               },
);
Route::group(
               [
                              'as' => 'users.',
                              'prefix' => 'users',
                              // dùng 2 middleware để phân quyền 
                              'middleware' => ['admin','auth'],
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
                              'middleware' => ['admin','auth'],

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
                              'middleware' => ['admin','auth'],

               ],
               function () {
                              Route::get('/', [RoomController::class, 'index'])->name('index');
                              Route::get('/create', [RoomController::class, 'create'])->name('create');
                              Route::get('/{room}/edit', [RoomController::class, 'edit'])->name('edit');
                              // Route::get('/{post}', [PostController::class, 'show'])->name('show');
                              // Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
               },
);
