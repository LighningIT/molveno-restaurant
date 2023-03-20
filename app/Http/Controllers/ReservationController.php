<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Models\GroupedTable;
use stdClass;

class ReservationController extends Controller
{
    public static function create(ReservationRequest $request) {
        $validated = $request->validated();

        $guest = new stdClass();
        $guest->firstname = $validated['firstname'];
        $guest->lastname = $validated['lastname'];
        $guest->phonenumber = $validated['phonenumber'];
        $guest->hotelguest = !empty($validated['hotel-guest'])
            ? $validated['hotel-guest'] : false;

        $guest_id = GuestController::validateGuest($guest);

        Reservation::store($validated, $guest_id->id);

        return Reservation::getReservationById($guest_id);
    }

    public static function check(Request $request) {
        return GroupedTable::getGroupedTablesByDate(
            $request->date,
            $request->time,
            // $request->num_persons
        );
    }

    public static function update(Request $request) {

    }

    public static function destroy(Request $request) {

    }
}
