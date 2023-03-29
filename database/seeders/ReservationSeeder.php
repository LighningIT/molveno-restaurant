<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Carbon\Carbon;


class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 50; $i++) {
            Reservation::factory()->create([
                "grouped_table_id" => random_int(1, 30),
                "guest_id" => $i + 1,
                "num_persons" => random_int(1, 8),
                "timespan" => random_int(60,240),
                "reservation_time" => Carbon::now()
                        ->addDays(rand(0, 14))
                        ->addHours(rand(0, 24))
                        ->addMinutes(rand(0, 60))
                        ->format("Y-m-d H:i")
            ]);
        }
    }
}
