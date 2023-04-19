<?php

namespace App\Http\Controllers;
use App\Models\GroupedTable;
use App\Models\TableStatus;
use App\Models\MenuCategory;
use App\Models\Menu;
use App\Models\Order;
use App\Models\MenuMealType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function menuIndex()
    {
        return view('menuoverview',[
            'FoodMenu' => Menu::getMenuById(1),
            'BeverageMenu' => Menu::getMenuById(2)
            /* [
                'menucategories' => MenuCategory::getMenuCategories(),
                'menuitems' => MenuItem::getMenuItem(),
                'menumealtypes' => MenuMealType::getMenuMealType()
            ] */
        ]);
    }

    public static function orderIndex()
    {
        return view('orderoverview', [
            'orders' => Order::getOrders()
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
