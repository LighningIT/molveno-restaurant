<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChildSeat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Reservation::factory(10)->create();
        \App\Models\Guest::factory(50)->create();

        $this->call([
            TableSectionSeeder::class,
            TableStatusSeeder::class,
            GroupedTableSeeder::class,
            TableSeeder::class,
            ReservationSeeder::class,
            MenuCategorySeeder::class,
            MenuItemSeeder::class,
            MenuMealTypeSeeder::class,
            MenuSeeder::class,
            UserRolesSeeder::class

        ]);


        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'username' => 'tuser',
            'email' => 'test@example.com',
            'user_roles_id' => 1
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'user_roles_id' => 6
        ]);

        ChildSeat::factory(10)->create();
        ChildSeat::factory(15)->create([
            "type" => "boosterseat",
        ]);
    }
}
