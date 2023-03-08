<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\Reservation;
use Illuminate\Http\Request;

class GroupedTableController extends Controller
{
    public static function getAllTable()
    {
        // dd(GroupedTable::getAllTable());
        return view('reservations',[
            'tables' => GroupedTable::getAllTable(),
            'reservations' => Reservation::getAllReservations()]);
    }

    public static function checkFreeTables(Request $request) {
        return 'free';
    }
}
