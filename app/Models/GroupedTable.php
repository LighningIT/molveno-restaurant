<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupedTable extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reservation():HasMany{
        return $this->hasMany(Reservation::class);
    }

    public function table() :HasMany {
        return $this->hasMany(Table::class);
    }

    public static function getAllTable()
    {
        return GroupedTable::with('reservation')->get();
    }
}
