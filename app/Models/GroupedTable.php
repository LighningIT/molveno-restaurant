<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    public static function getAllTable() {
        $start = Carbon::now()->subHours(2);
        $end = Carbon::now()->addHours(2);
        $tables = GroupedTable::with(['reservation' => fn($query) => $query->whereBetween('reservation_time', [$start, $end])])
            ->get();
        return $tables->groupBy('table_section_id');
    }

    public static function getChairsAsc()
    {
        return GroupedTable::orderBy('chairs', 'asc')->get();
    }

    public static function getGroupedTablesByDate($date, $time) {
        /* return grouped tables where no reservation on date */
        $datetime = Carbon::create($date . $time);
        $start = Carbon::create($datetime)->subHours(2);
        $end = Carbon::create($datetime)->addHours(2);

        $tables = GroupedTable::with('reservation')->get();

        $tables = $tables->load(['reservation' => fn($query) => $query->whereBetween('reservation_time', [$start, $end]) ]);
        return $tables->groupBy('table_section_id');
    }

    public static function updateStatus($statusId) {
        // GroupedTable::where("id", $id)->update(["status_id" => $statusId]);
        return TableStatus::where("status", $statusId)->first();
    }

    public static function updateTableLocation($id, $amount) {
        GroupedTable::where('id', $id)->update(["chairs" => $amount]);
    }
}
