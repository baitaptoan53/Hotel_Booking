<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::group(
               [
                              'as' => 'users.',
                              'prefix' => 'users',
               ],
               function () {
                              Route::get('/', [UsersController::class, 'index'])->name('index');
                              Route::get('export/', [UsersController::class, 'export'])->name('export');

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
                              Route::get('export/', [BookingController::class, 'export'])->name('export');
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
                              Route::get('/create', [RoomController::class, 'create'])->name('create');
                              Route::get('/{room}/edit', [RoomController::class, 'edit'])->name('edit');
                              Route::get('export/', [RoomController::class, 'export'])->name('export');
                              Route::post('import/', [RoomController::class, 'import'])->name('import');
                              // Route::get('/{post}', [PostController::class, 'show'])->name('show');
                              // Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
               },
);
