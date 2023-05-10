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
        $totalChairs = $this->countTables();

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
    public static function countTables()
    {
        return Table::all()->count();
    }

    public static function updateTableLocation(Request $request) {
        GroupedTable::updateTableLocation($request->id, $request->amount);
    }

    public static function resetGroupedTables() {
        // Artisan::call("migrate", ["--path" => "2023_03_01_144548_create_grouped_tables_table", "--force" => true]);
        // Artisan::call("db:seed", ["--class" => "GroupedTableSeeder"]);

        $tables = Table::all();

        $groupedTables = GroupedTable::all();

        foreach ($tables as $table) {
            $groupedTables[$table->id]->chairs += $table->chairs;
        }


    }
}
