<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupedTable;

class GroupedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        GroupedTable::factory()->times(5)->create([
            "table_section_id" => 1,
        ]);
        GroupedTable::factory()->times(10)->create([
            "table_section_id" => 2,
        ]);
        GroupedTable::factory()->times(16)->create([
            "table_section_id" => 3,
        ]);
    }
}
