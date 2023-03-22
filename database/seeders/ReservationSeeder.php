<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 20; $i++) {
            Reservation::factory()->create([
                "grouped_table_id" => random_int(1, 30),
                "guest_id" => $i + 1,
                "num_persons" => random_int(1, 8),
                'timespan' => random_int(60,240)
            ]);
        }
    }
}
