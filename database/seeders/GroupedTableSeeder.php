<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupedTable;
use App\Models\Table;

class GroupedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GroupedTable::factory()->times(5)->create([
        //     "table_section_id" => 1,
        // ]);
        // GroupedTable::factory()->times(10)->create([
        //     "table_section_id" => 2,
        // ]);
        // GroupedTable::factory()->times(16)->create([
        //     "table_section_id" => 3,
        // ]);

        // according to customers excel section 1
        GroupedTable::factory()->create([
            'table_section_id' => 1,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 1,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 1,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
          
            'table_section_id' => 1,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 1,
            'combined' => true,
            'chairs' => 4,
        ]);

        //section 2
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 6,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 6,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 6,
        ]);

        //section 3
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 6,
        ]);
        GroupedTable::factory()->create([
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 6,
        ]);
    }
}
