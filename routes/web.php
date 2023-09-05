<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
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



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('/city/{id}', [HomeController::class, 'city_room'])->name('city.room');

Auth::routes();
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::group([
    'prefix' => 'booking',
], function () {
    Route::controller(RoomController::class)->group(function () {
        Route::get('/success', 'booking_success')->name('booking.success')->middleware('requireLogin');
        Route::get('/{id}', 'booking')->name('room.booking')->middleware('requireLogin');
        Route::post('/{id}', 'booking_store')->name('room.booking.store')->middleware('requireLogin');
        Route::get('select2_hotel',  'select2_hotel')->name('select2_hotel');
        Route::get('select2_room_type',  'select2_room_type')->name('select2_room_type');
        Route::get('/room',  'index')->name('room.index');
        Route::get('/room/{id}',  'show')->name('room.show');
    });
});
Route::get('/about', function () {
    return view('about.index');
})->name('about.index');
Route::get('/service', function () {
    return view('service.index');
})->name('service.index');
Route::get('/admin/users', function () {
    return view('admin.users.index');
})->name('admin.users.index');

Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
Route::get('lang/home', [LangController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');
    Route::post('/contact', 'store')->name('contact.us.store');
});