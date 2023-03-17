<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Guest;
use App\Http\Requests\ReservationRequest;
use App\Models\GroupedTable;

class ReservationController extends Controller
{
    public static function create(ReservationRequest $request) {
        /** guest object
         * firstname
         * lastname
         * phone_number
         * num_persons
         */
        $guest = new Guest(
            $request->firstname,
            $request->lastname,
            $request->phonenumber,
            $request->guest
            );
        $guest = GuestController::validateGuest($request->guest);
        $request->reservation->guest_id = Guest::create($guest);

        $validated = $request->validated();

        Reservation::create($validated);

        return Reservation::getReservationById($request->reservation->guest_id);
    }

    public static function check(Request $request) {
        return GroupedTable::getGroupedTablesByDate(
            $request->date,
            $request->time,
            $request->num_persons
        );
    }

    public static function update(Request $request) {

    }

    public static function destroy(Request $request) {

    }
}
