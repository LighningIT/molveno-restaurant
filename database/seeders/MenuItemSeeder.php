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
            'name' => 'White whine'
        ]);

        \App\Models\MenuItem::factory()->create([
            'name' => 'Red wine'
        ]);

        \App\Models\MenuItem::factory()->create([
            'name' => 'Rosé'
        ]);

        \App\Models\MenuItem::factory()->create([
            'name' => 'Sparkling wine'
        ]);
    }
}
