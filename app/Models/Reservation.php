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

    public static function getReservationById($id) {
        return Reservation::where('guest_id', $id)->first();
    }

    public static function create($reservation) {
        Reservation::create([
            'grouped_table_id' => $reservation->grouped_table_id,
            'guest_id' => $reservation->guest_id,
            'num_persons' => $reservation->num_persons
        ]);

        return Reservation::with('guest')
                ->where('guest_id', $reservation->id)
                ->first();
    }
}
