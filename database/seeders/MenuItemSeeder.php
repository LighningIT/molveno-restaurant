<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\MenuItem::factory()->create([
            'name' => 'White whine',
            'menu_category_id' => 12
        ]);

        \App\Models\MenuItem::factory()->create([
            'name' => 'Red wine',
            'menu_category_id' => 12
        ]);

        \App\Models\MenuItem::factory()->create([
            'name' => 'Rosé',
            'menu_category_id' => 12
        ]);

        \App\Models\MenuItem::factory()->create([
            'name' => 'Sparkling wine',
            'menu_category_id' => 12
        ]);
    }
}
