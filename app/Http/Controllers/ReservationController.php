<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Guest;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    public static function create(ReservationRequest $request) {
        // validate
        $guest = GuestController::validateGuest($request->guest);
        $request->reservation->guest_id = Guest::create($guest);

        $validated = $request->validated();

        Reservation::create($validated);

        return Reservation::getReservationById($request->reservation->guest_id);
    }

    public static function update(Request $request) {

    }

    public static function destroy(Request $request) {

    }
}
