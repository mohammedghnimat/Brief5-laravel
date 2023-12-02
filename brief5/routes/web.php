<?php

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

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardUserController;

// Roles
Route::resource('roles', RoleController::class);

// Users
Route::resource('users', UserController::class);

// Properties
Route::resource('properties', PropertyController::class);

// PropertyTypes
Route::resource('property_types', PropertyTypeController::class);

// Locations
Route::resource('locations', LocationController::class);

// Bookings
Route::resource('bookings', BookingController::class);

// Reviews
Route::resource('reviews', ReviewController::class);

// this the dashboarduser cotroller

    Route::get('/dashboard', [DashboardUserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/profile/{id}', [DashboardUserController::class, 'profile'])->name('user.profile');
    Route::put('/user/profile/update/{id}', [DashboardUserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/change-password', [DashboardUserController::class, 'changePassword'])->name('user.changePassword');
    Route::get('/user/booked-properties', [DashboardUserController::class,'bookedProperties'])->name('user.booking');
    Route::delete('/user/bookings/{id}', [DashboardUserController::class,'delete'])->name('user.booking.delete');
    Route::get('/user/reviews', [DashboardUserController::class, 'userReviews'])->name('user.reviews');

