<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TableStatus::factory()->create([
            'status' => 'free'
        ]);
        
        \App\Models\TableStatus::factory()->create([
            'status' => 'taken'
        ]); 

        \App\Models\TableStatus::factory()->create([
            'status' => 'soon'
        ]); 
    }
}
