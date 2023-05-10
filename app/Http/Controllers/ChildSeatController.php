<?php

namespace App\Http\Controllers;

use App\Models\ChildSeat;
use Illuminate\Http\Request;

class ChildSeatController extends Controller
{
    public static function store(Request $request) {
        $request->validated();
        if (!empty($request->highchair)) {
            for ($i = 0; $i < count($request->highchair); $i++) {
                ChildSeat::store("highchair");
            }
        }
        if (!empty($request->boosterseat)) {
            for ($i = 0; $i < count($request->boosterseat); $i++) {
                ChildSeat::store("boosterseat");
            }
        }
        
        return redirect()->route("tablemanagement")->with("success", "Childseats added.");
    }
}
