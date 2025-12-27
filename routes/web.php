<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\MidtransWebhookController;




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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/fasilitas', [UserController::class, 'fasilitas'])->name('fasilitas');
Route::get('/galeri', [UserController::class, 'galeri'])->name('galeri');
Route::get('/booking', [UserController::class, 'booking'])->name('booking');

/*
|--------------------------------------------------------------------------
| MIDTRANS WEBHOOK (WAJIB DI LUAR AUTH)
|--------------------------------------------------------------------------
*/
Route::post('/midtrans/notification', [BookingController::class, 'midtransNotification']);
Route::post('/midtrans/notification', [MidtransWebhookController::class, 'handle']);




Route::prefix('admin')->middleware(['auth', 'auth.role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', UsersController::class);
    Route::resource('bookings', AdminBookingController::class);


    // Route::resource('kamar', KamarController::class);
    // Route::resource('hotel', HotelController::class);
});

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/riwayat-booking', [BookingController::class, 'index'])->name('booking.history');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
});

require __DIR__ . '/auth.php';