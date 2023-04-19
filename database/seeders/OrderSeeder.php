<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Order::factory(10)->create([
            'section_id' => 1,
            'order_type' => 1,
            'order_status' => 1,
        ]);
    }
}
