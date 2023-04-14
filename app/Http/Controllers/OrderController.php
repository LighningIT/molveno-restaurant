<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\TableStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public static function getAllTable()
    {
        return view('waiteroverview',[
            'tables' => GroupedTable::getAllTable(),
            'status' => TableStatus::getAllStatus()
        ]);
    }
}
