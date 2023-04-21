<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuMealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\MenuMealType::factory()->create([
            'name' => 'Finger food',
            'menu_id' => 1
        ]);

        \App\Models\MenuMealType::factory()->create([
            'name' => 'Lunch',
            'menu_id' => 1
        ]);

        \App\Models\MenuMealType::factory()->create([
            'name' => 'Diner',
            'menu_id' => 1
        ]);

        \App\Models\MenuMealType::factory()->create([
            'name' => 'Beverage',
            'menu_id' => 2
        ]);
    }
}
