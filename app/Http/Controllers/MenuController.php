<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public static function menuIndex()
    {
        return view('orderoverview');
    }

}
