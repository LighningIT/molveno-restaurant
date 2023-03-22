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

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('reservationedit',['reservation'=>Reservation::getReservationById($request->id)]);
    }

    public static function update(Reservationrequest $request)
    {
        Reservation::reservationupdate($request);

        // // Guest::reservationupdate($request);

        return redirect()->route('reservations');

        // $reservation = Reservation::find($id);
        // $reservation->update($request->all());
        // return redirect(route('reservations'));
    }

    public static function destroy(Request $request) {

    }
}
