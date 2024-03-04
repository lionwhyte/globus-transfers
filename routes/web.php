<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [RouteController::class, 'search']);

Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

// Payment success route
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
// Payment cancel route
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/destinations/cities', [LocationController::class, 'cities'])->name('destinations.cities');
Route::get('/destinations/airports', [LocationController::class, 'airports'])->name('destinations.airports');
Route::get('/destinations/ports', [LocationController::class, 'ports'])->name('destinations.ports');
Route::get('/destinations/national-parks', [LocationController::class, 'parks'])->name('destinations.parks');
Route::get('/destinations/marinas', [LocationController::class, 'marinas'])->name('destinations.marinas');
Route::get('/destinations/hotels', [LocationController::class, 'hotels'])->name('destinations.hotels');
Route::get('/destinations/towns', [LocationController::class, 'towns'])->name('destinations.towns');
Route::get('/destinations/beaches', [LocationController::class, 'beaches'])->name('destinations.beaches');

Route::get('/destinations/{slug}', [LocationController::class, 'show'])->name("destinations.show");