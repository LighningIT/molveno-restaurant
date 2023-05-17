<?php

namespace App\Http\Controllers;

use App\Models\ChildSeat;
use Illuminate\Http\Request;

class ChildSeatController extends Controller
{
    public static function store(Request $request) {
        $request->validated();
        if (!empty($request->highchair) && $request->highchair == "Highchair") {
            for ($i = 0; $i < $request->amount; $i++) {
                ChildSeat::store("highchair");
            }
        }
        if (!empty($request->boosterseat) && $request->highchair == "Boosterseat") {
            for ($i = 0; $i < $request->amount; $i++) {
                ChildSeat::store("boosterseat");
            }
        }

        return redirect()->route("tablemanagement")->with("success", "Childseats added.");
    }
}
