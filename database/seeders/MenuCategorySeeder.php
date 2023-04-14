<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\MenuCategory::factory()->create([
            'name' => 'Sandwiches'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Salads'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Warm meals'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Side dishes'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Appetizer'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Main dish'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Dessert'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Children’s menu'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Hot drinks'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Soda'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Beer'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Wine'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Liquor'
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Cocktails'
        ]);
    }
}
