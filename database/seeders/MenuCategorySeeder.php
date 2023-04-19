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
            'name' => 'Sandwiches',
            'menu_meal_type_id' => 2
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Salads',
            'menu_meal_type_id' => 2
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Warm meals',
            'menu_meal_type_id' => 2
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Side dishes',
            'menu_meal_type_id' => 2
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Appetizer',
            'menu_meal_type_id' => 3
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Main dish',
            'menu_meal_type_id' => 3
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Dessert',
            'menu_meal_type_id' => 3
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Children’s menu',
            'menu_meal_type_id' => 3
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Hot drinks',
            'menu_meal_type_id' => 4
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Soda',
            'menu_meal_type_id' => 4
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Beer',
            'menu_meal_type_id' => 4
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Wine',
            'menu_meal_type_id' => 4
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Liquor',
            'menu_meal_type_id' => 4
        ]);

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Cocktails',
            'menu_meal_type_id' => 4
        ]);
    }
}
