<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GroupedTableController;
use App\Http\Controllers\ReservationController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/reservations/check', [ReservationController::class, 'check']);

Route::middleware('auth')->controller(ReservationController::class)->group(function() {
    Route::get('/reservations/edit', 'check');
    Route::post('/reservations/edit', 'store');
    Route::patch('/reservations/edit','update');
    Route::delete('/reservations/edit', 'destroy');
});

Route::middleware('auth')->get('/reservations', [GroupedTableController::class,'getAllTable'])->name('reservations');
Route::middleware('auth')->post('/reservations', [GroupedTableController::class,'updateStatus']);

require __DIR__.'/auth.php';
