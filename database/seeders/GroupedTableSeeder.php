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
            'id' => 1,
            'table_section_id' => 1,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 2,
            'table_section_id' => 1,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 3,
            'table_section_id' => 1,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 4,
            'table_section_id' => 1,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 5,
            'table_section_id' => 1,
            'combined' => true,
            'chairs' => 4,
        ]);

        //section 2
        GroupedTable::factory()->create([
            'id' => 6,
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 6,
        ]);
        GroupedTable::factory()->create([
            'id' => 7,
            'table_section_id' => 2,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 8,
            'table_section_id' => 2,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 9,
            'table_section_id' => 2,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 10,
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 11,
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 12,
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 13,
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 14,
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 6,
        ]);
        GroupedTable::factory()->create([
            'id' => 15,
            'table_section_id' => 2,
            'combined' => true,
            'chairs' => 6,
        ]);

        //section 3
        GroupedTable::factory()->create([
            'id' => 16,
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 17,
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 18,
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 19,
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 20,
            'table_section_id' => 3,
            'combined' => false,
            'chairs' => 2,
        ]);
        GroupedTable::factory()->create([
            'id' => 21,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 22,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 23,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 24,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 25,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 26,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 27,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 28,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 29,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 4,
        ]);
        GroupedTable::factory()->create([
            'id' => 30,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 6,
        ]);
        GroupedTable::factory()->create([
            'id' => 31,
            'table_section_id' => 3,
            'combined' => true,
            'chairs' => 6,
        ]);
    }
}
