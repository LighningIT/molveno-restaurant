<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\TableStatus;
use App\Models\MenuCategory;
use App\Models\Menu;
use App\Models\MenuMealType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function menuIndex()
    {
        return view('orderoverview',[
            'FoodMenu' => Menu::getMenuById(1),
            'BeverageMenu' => Menu::getMenuById(2)

            // WIP added this code for later use during waiter overview
            /* [
                'menucategories' => MenuCategory::getMenuCategories(),
                'menuitems' => MenuItem::getMenuItem(),
                'menumealtypes' => MenuMealType::getMenuMealType()
            ] */
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
