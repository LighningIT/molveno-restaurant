<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Builder;

class Table extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function groupedTable(): BelongsTo {
        return $this->belongsTo(GroupedTable::class);
    }

    public static function countTables()
    {
        return Table::all()->count();
    }

    public static function updateTable($id)
    {
        Table::where("grouped_table_id", $id)->update(['grouped_table_id' => 0]);
    }


    public static function getCombinedTables() {
        $tables = Table::select("chairs", "grouped_table_id")->orderBy("grouped_table_id")->get();

        $combineTables = [];

        foreach($tables as $table) {
            if (!array_key_exists($table->grouped_table_id, $combineTables)) {
                $combineTables[$table->grouped_table_id] = $table;
            } else {
                $combineTables[$table->grouped_table_id]->chairs += $table->chairs;
            }
        }
        return $combineTables;
    }
}
