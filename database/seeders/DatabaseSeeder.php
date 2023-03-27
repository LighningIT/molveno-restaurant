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
        \App\Models\Guest::factory(20)->create();
        
        $this->call([
            TableSectionSeeder::class,
            TableStatusSeeder::class,
            GroupedTableSeeder::class,
            TableSeeder::class,
            ReservationSeeder::class
        ]);


        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        ChildSeat::factory(10)->create();
        ChildSeat::factory(15)->create([
            "type" => "boosterseat",
        ]);
    }
}
