<?php

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
