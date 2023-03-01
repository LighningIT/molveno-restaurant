<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public static function getAllTable() 
    {
        return view('reservation',['tables'=>Table::getAllTable()]);
    }
}
