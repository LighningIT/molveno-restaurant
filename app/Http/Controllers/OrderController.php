<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\Reservation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function getAllTable()
    {
        // dd(GroupedTable::getAllTable());
        return view('waiteroverview',[
            'tables' => GroupedTable::getAllTable()
        ]);
    }
}
