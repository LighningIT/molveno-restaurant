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
            'name' => 'Finger food'
        ]);

        \App\Models\MenuMealType::factory()->create([
            'name' => 'Lunch'
        ]);

        \App\Models\MenuMealType::factory()->create([
            'name' => 'Diner'
        ]);

        \App\Models\MenuMealType::factory()->create([
            'name' => 'Beverage'
        ]);
    }
}
