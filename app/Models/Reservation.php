<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tables():BelongsTo{
        return $this->belongsTo(GroupedTable::class);
    }

    public static function getAllReservations() {
        return Reservation::get();
    } 

}
