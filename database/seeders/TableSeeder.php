<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Table;
class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Table::factory()->times(30)->create();
        Table::factory()->times(5)->create([
            "table_section_id" => 1,
        ]);
        Table::factory()->times(10)->create([
            "table_section_id" => 2,
        ]);
        Table::factory()->times(16)->create([
            "table_section_id" => 3,
        ]);
    }
}
