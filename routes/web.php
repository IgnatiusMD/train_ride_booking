<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\TrainClassController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ScheduleClassController;
use App\Http\Controllers\BookingController;
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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('trains', TrainController::class);
Route::resource('train-classes', TrainClassController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('schedule-classes', ScheduleClassController::class);
Route::resource('bookings', BookingController::class)->middleware('auth');

require __DIR__.'/auth.php';
