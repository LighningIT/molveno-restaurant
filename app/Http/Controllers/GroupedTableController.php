<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\Reservation;
use App\Models\TableStatus;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Models\ChildSeat;

class GroupedTableController extends Controller
{
    public static function getAllTable()
    {
        return view('reservations',[
            'tables' => GroupedTable::getAllTable(),
            'reservations' => Reservation::getAllReservations(),
            'status' => TableStatus::getAllStatus()]);
    }

    public static function updateStatus(Request $request) {
        if ($request->statusId == 'free' || $request->statusId == 'soon') {
        return GroupedTable::updateStatus('taken');
        }

        return GroupedTable::updateStatus('free');
    }

    public function getTableManagement()
    {
        $totalTableAmount = $this->countGroupedTables();

        $totalChairs = Table::countTables();

        return view('groupedtablemanagement', [
            'tables' => GroupedTable::getAllTable(),
            'totalTableAmount' => $totalTableAmount,
            'totalChairs' => $totalChairs,
            'totalChildSeats' => ChildSeat::getAllChildSeats()
        ]);
    }

    public static function countGroupedTables() {
        return GroupedTable::all()->count();
    }

    public static function deleteTable(Request $request) {
        GroupedTable::destroy($request->id);
        Table::updateTable($request->id);
        return $request->id;
    }


    public static function updateTableLocation(Request $request) {
        GroupedTable::updateTableLocation($request->id, $request->amount);
    }

    public static function resetGroupedTables() {
        $combineTables = Table::getCombinedTables();

        foreach($combineTables as $table) {
            GroupedTable::updateTableLocation($table->grouped_table_id, $table->chairs);
        }

        return $combineTables;
    }
}
