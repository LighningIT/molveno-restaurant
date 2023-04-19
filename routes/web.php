<?php

use App\Http\Controllers\ProfileController;
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

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
=======
Route::get("/reservations", function () {
    return view("reservations");
})
    ->middleware(["auth", "verified"])
    ->name("reservations");
>>>>>>> 35ea66136599b4802383603f905b1a7c08a0b216

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

<<<<<<< HEAD
require __DIR__.'/auth.php';
=======
Route::middleware('auth')->controller(ReservationController::class)->group(function() {
    Route::get('/reservations/edit', 'check');
    Route::post('/reservations/edit', 'store');
    Route::patch('/reservations/edit{id}','update');
    Route::delete('/reservations/edit{id}', 'destroy');
});

Route::middleware("auth")
    ->get("/reservations", [GroupedTableController::class, "getAllTable"])
    ->name("reservations");

Route::middleware("auth")->post("/reservations", [
    GroupedTableController::class,
    "updateStatus",
]);

Route::middleware("auth")->get("/tablemanagement", [
    GroupedTableController::class,
    "getTableManagement",
    ])
    ->name('tablemanagement');

Route::middleware("auth")
    ->get("/reservationpages{id}", [ReservationController::class, "edit"])
    ->name("reservationpages");

Route::middleware('auth')->get('/waiteroverview', [OrderController::class,'getAllTable'])->name('waiteroverview');

require __DIR__ . "/auth.php";
>>>>>>> 35ea66136599b4802383603f905b1a7c08a0b216
