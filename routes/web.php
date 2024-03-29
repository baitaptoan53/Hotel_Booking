<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\CityController as AdminCityController;

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


Route::group([
    'prefix' => '',
], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home.index');
        Route::get('autocomplete', 'autocomplete')->name('autocomplete');
        Route::get('/city/{id}',  'city_room')->name('city.room');
        Route::get('search',  'search')->name('search');
        Route::get('select2_country',  'select2_country')->name('select2_country');
    });
});
Route::controller(HomeController::class)->group(
    function () {
    }
);

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
        Route::get('/room',  'index')->name('room.index');
        Route::get('/room/{id}',  'show')->name('room.show');
    });
});
Route::controller(RoomController::class)->group(
    function () {
        Route::get('select2_hotel',  'select2_hotel')->name('select2_hotel');
        Route::get('select2_room_type',  'select2_room_type')->name('select2_room_type');
    }
);


Route::get('/about', function () {
    return view('about.index');
})->name('about.index');
Route::get('/service', function () {
    return view('service.index');
})->name('service.index');
Route::get('/admin/users', function () {
    return view('admin.users.index');
})->name('admin.users.index')->middleware('admin');

Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
Route::get('lang/home', [LangController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');
    Route::post('/contact', 'store')->name('contact.us.store');
});
Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin'],
    // 'name' => 'admin.',
], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.welcome');
    Route::group(
        [
            // 'name' => 'users.',
            'prefix' => 'users',
            // dùng 2 middleware để phân quyền 
        ],
        function () {
            Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users.index');
        },
    );
    Route::group(
        [
            // 'as' => 'booking.',
            'prefix' => 'booking',
        ],
        function () {
            Route::get('/', [AdminBookingController::class, 'index'])->name('admin.booking.index');
        },
    );
    Route::group(
        [
            // 'as' => 'room.',
            'prefix' => 'room',
        ],
        function () {
            Route::get('/', [AdminRoomController::class, 'index'])->name('admin.room.index');
            Route::get('/create', [AdminRoomController::class, 'create'])->name('admin.room.create');
            Route::get('/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.room.edit');
        },
    );
    Route::group(
        [
            'prefix' => 'city',
        ],
        function () {
            Route::get('/', [AdminCityController::class, 'index'])->name('admin.city.index');
            Route::get('/create', [AdminCityController::class, 'create'])->name('admin.city.create');
            Route::get('/{city}/edit', [AdminCityController::class, 'edit'])->name('admin.city.edit');
        },
    );
});
