<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public static function create(Request $request) {
        // validate
        $validated = $request->validate([
            'guest' => ['required'],
            'table' => ['required'],
            'date' => ['required'],
        ]);


    }

    public static function update(Request $request) {

    }

    public static function destroy(Request $request) {

    }
}
