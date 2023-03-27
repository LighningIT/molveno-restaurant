<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Guest;
use App\Http\Requests\ReservationRequest;
use App\Models\GroupedTable;
use stdClass;

class ReservationController extends Controller
{
    public static function store(ReservationRequest $request) {
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

    public static function check(ReservationRequest $request) {
        return GroupedTable::getGroupedTablesByDate(
            $request->date,
            $request->time,
        );
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('reservationedit',['reservation' => Reservation::getReservationById($request->id)]);
    }

    public static function update(Request $request, string $id)
    {
        Reservation::reservationUpdate($request);

        Guest::guestUpdate($request);

        return redirect()->route('reservations');

        // $reservation = Reservation::find($id);
        // $reservation->update($request->all());
        // return redirect(route('reservations'));
    }

    public static function destroy(Request $request) {

    }
}
