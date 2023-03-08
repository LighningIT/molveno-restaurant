<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public static function validateGuest(GuestRequest $guest) {
        return $guest->validated();
    }
}
