<?php


use App\Http\Controllers\ChildSeatController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GroupedTableController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\RegisteredUserController;

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


Route::get("/reservations", function () {
    return view("reservations");
})
    ->middleware(["auth", "verified"])
    ->name("reservations");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

Route::middleware("auth")->post("/updateTableLocation", [GroupedTableController::class, "updateTableLocation"])->name("updateTableLocation");
Route::middleware("auth")->get("/resetGroupedTables", [GroupedTableController::class, "resetGroupedTables"])->name("resetGroupedTables");

Route::middleware("auth")->post("/addGroupedTable", [GroupedTableController::class, "addGroupedTable"]);

Route::middleware("auth")->post("/childseats", [ChildSeatController::class, "store"]);

Route::middleware("auth")
    ->get("/reservationpages{id}", [ReservationController::class, "edit"])
    ->name("reservationpages");

Route::middleware('auth')->get('/waiteroverview', [OrderController::class,'getAllTable'])->name('waiteroverview');


Route::middleware('auth')->get('/orderoverview', [OrderController::class,'menuIndex'])->name('orderoverview');

Route::middleware('auth')->delete('/tablemanagementDelete', [GroupedTableController::class, 'deleteTable'])->name('tablemanagementDelete');

Route::middleware('auth', 'verified')->get('/adminoverview', [AdminController::class, 'getAllUsers'] )->name('adminoverview');

Route::middleware('auth')->controller(AdminController::class)->group(function() {
    Route::get('/adminoverview/edit', 'create');
    Route::post('/adminoverview/edit', 'store');
    Route::patch('/adminoverview/edit', 'update');
    Route::delete('adminoverview/edit', 'destroy');
});


require __DIR__ . "/auth.php";

