<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i = 0; $i < 14; $i++) {
        //     Menu::factory()->create([
        //         "category_id" => $i + 1
        //     ]);
        // }

        for($i = 0; $i < 4; $i++) {
            Menu::factory()->create([
                "meal_type_id" => $i + 1
            ]);
        }

        // for($i = 0; $i < 4; $i++) {
        //     Menu::factory()->create([
        //         "menu_item_id" => $i + 1
        //     ]);
        // }
    }
}
