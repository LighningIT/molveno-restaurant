<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;

class TableController extends Controller
{

    public static function getAllTable() 
    {
        return view('reservations',[
            'tables'=>Table::getAllTable(),
            'reservations'=>Reservation::getAllReservations()
            
        ]);
    }
}
