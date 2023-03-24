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

    public static function updateStatus(Request $request) {
        if ($request->statusId == 1 || $request->statusId == 3) {
        return GroupedTable::updateStatus($request->id, 2);
        }

        return GroupedTable::updateStatus($request->id, 1);
    }

    public static function checkFreeTables(Request $request) {
        return 'free';
    }
}
