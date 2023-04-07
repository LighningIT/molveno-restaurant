<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GroupedTableController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrderController;
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

Route::get("/", function () {
    return view("welcome");
});

Route::get("/reservations", function () {
    return view("reservations");
})
    ->middleware(["auth", "verified"])
    ->name("reservations");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );
});


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
