<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\TableStatus;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\MenuMealType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function menuIndex()
    {
        return view('orderoverview',[
            'menu' => [
                'menucategories' => MenuCategory::getMenuCategories(),
                'menuitems' => MenuItem::getMenuItem(),
                'menumealtypes' => MenuMealType::getMenuMealType() 
            ]
        ]);
    }
   
    public static function getAllTable()
    {
        return view('waiteroverview',[
            'tables' => GroupedTable::getAllTable(),
            'status' => TableStatus::getAllStatus()
        ]);
    }
}
