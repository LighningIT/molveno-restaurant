<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Guest;

class ReservationController extends Controller
{
    public static function create(Request $request) {
        // validate
        $guest = $request->guest->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'phone_number' => ['required'],
            'num_persons' => ['required']
        ]);

        $request->reservation->guest_id = Guest::create($guest);

        $validated = $request->reservation->validate([
            'guest' => ['required'],
            'table' => ['required'],
            'date' => ['required'],
        ]);

        return Reservation::create($validated);
    }

    public static function update(Request $request) {

    }

    public static function destroy(Request $request) {

    }
}
