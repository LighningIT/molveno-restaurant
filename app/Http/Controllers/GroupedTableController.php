<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use Illuminate\Http\Request;

class GroupedTableController extends Controller
{
    public static function getAllTable()
    {
        return view('reservations',['tables'=>GroupedTable::getAllTable()]);
    }
}
