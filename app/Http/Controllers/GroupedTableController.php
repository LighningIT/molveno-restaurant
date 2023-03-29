<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\Reservation;
use App\Models\TableStatus;
use Illuminate\Http\Request;

class GroupedTableController extends Controller
{
    public static function getAllTable()
    {
        // dd(GroupedTable::getAllTable());
        return view('reservations',[
            'tables' => GroupedTable::getAllTable(),
            'reservations' => Reservation::getAllReservations(),
            'status' => TableStatus::getAllStatus()]);
    }

    public static function updateStatus(Request $request) {
        if ($request->statusId == 1 || $request->statusId == 3) {
        return GroupedTable::updateStatus($request->id, 2);
        }

        return GroupedTable::updateStatus($request->id, 1);
    }

    public  function getTableManagement()
    {
        $totalTableAmount = $this->countTables();

        return view('groupedtablemanagement', [
            'tables' => GroupedTable::getAllTable(),
            'totalTableAmount' => $totalTableAmount]);
    }

    public static function countTables()
    {
        $countTables = GroupedTable::all()->count();
        return $countTables;

    }

    public static function checkFreeTables(Request $request) {
        return 'free';
    }
}
