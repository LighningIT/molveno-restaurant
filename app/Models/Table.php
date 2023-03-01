<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Builder;

class Table extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reservation():HasMany{
        return $this->hasMany(Reservation::class);
    }

    public static function getAllTable()
    {
        return Table::with('reservation')->get();
    }
}
