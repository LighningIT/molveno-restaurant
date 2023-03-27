<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GroupedTable extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reservation() : HasMany{
        return $this->hasMany(Reservation::class);
    }

    public function table() : HasMany {
        return $this->hasMany(Table::class);
    }

    public function status() : HasOne {
        return $this->hasOne(TableStatus::class, 'id', 'status_id');
    }

    public static function getAllTable()
    {
        $tables = GroupedTable::with('reservation')
            ->with('status')->get();
        return $tables->groupBy('table_section_id');
    }

    public static function getChairsAsc()
    {
        return GroupedTable::orderBy('chairs', 'asc')->get();
    }

    public static function getTableBySection($id) {
        return GroupedTable::where('table_section_id', $id)->with('reservation')->get();
    }
}
