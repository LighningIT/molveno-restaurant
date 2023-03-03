<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Guest;


class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function guests():HasOne{
        return $this->hasOne(Guest::class);
    }

    public function tables():BelongsTo{
        return $this->belongsTo(GroupedTable::class);
    }

    public static function getAllReservations() {
        return Reservation::with('guests')->get();
    }


}
