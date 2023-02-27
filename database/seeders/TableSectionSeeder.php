<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TableSection::factory()->create([
            'name' => 'upper'
        ]);
        
        \App\Models\TableSection::factory()->create([
            'name' => 'lower'
        ]); 

        \App\Models\TableSection::factory()->create([
            'name' => 'terrace'
        ]); 
    }
}
