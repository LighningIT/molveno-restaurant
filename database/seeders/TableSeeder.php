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
        Table::factory()->create(["grouped_table_id" => 1 ]);
        Table::factory()->create(["grouped_table_id" => 2 ]);
        Table::factory()->times(2)->create(["grouped_table_id" => 3 ]);
        Table::factory()->times(2)->create(["grouped_table_id" => 4 ]);
        Table::factory()->times(2)->create(["grouped_table_id" => 5 ]);
        Table::factory()->times(3)->create(["grouped_table_id" => 6 ]);
        Table::factory()->create(["grouped_table_id" => 7 ]);
        Table::factory()->create(["grouped_table_id" => 8 ]);
        Table::factory()->create(["grouped_table_id" => 9 ]);
        Table::factory()->times(2)->create(["grouped_table_id" => 10]);
        Table::factory()->times(2)->create(["grouped_table_id" => 11]);
        Table::factory()->times(2)->create(["grouped_table_id" => 12]);
        Table::factory()->times(2)->create(["grouped_table_id" => 13]);
        Table::factory()->times(3)->create(["grouped_table_id" => 14]);
        Table::factory()->times(3)->create(["grouped_table_id" => 15]);
        Table::factory()->create(["grouped_table_id" => 16]);
        Table::factory()->create(["grouped_table_id" => 17]);
        Table::factory()->create(["grouped_table_id" => 18]);
        Table::factory()->create(["grouped_table_id" => 19]);
        Table::factory()->create(["grouped_table_id" => 20]);
        Table::factory()->times(2)->create(["grouped_table_id" => 21]);
        Table::factory()->times(2)->create(["grouped_table_id" => 22]);
        Table::factory()->times(2)->create(["grouped_table_id" => 23]);
        Table::factory()->times(2)->create(["grouped_table_id" => 24]);
        Table::factory()->times(2)->create(["grouped_table_id" => 25]);
        Table::factory()->times(2)->create(["grouped_table_id" => 26]);
        Table::factory()->times(2)->create(["grouped_table_id" => 27]);
        Table::factory()->times(2)->create(["grouped_table_id" => 28]);
        Table::factory()->times(2)->create(["grouped_table_id" => 29]);
        Table::factory()->times(3)->create(["grouped_table_id" => 30]);
        Table::factory()->times(3)->create(["grouped_table_id" => 31]);
    }
}
