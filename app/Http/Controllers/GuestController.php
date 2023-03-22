<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public static function validateGuest($guest) {
        return Guest::store($guest);
    }
}
