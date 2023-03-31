<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function guest() : BelongsTo {
        return $this->belongsTo(Guest::class);
    }

    public static function getAllReservations() {
        return Reservation::with('guest')->orderBy('reservation_time', 'asc')->get();
    }

    public static function getReservationById($id) {
        return Reservation::with('guest')->where('guest_id', $id)->first();
    }

    public static function store($reservation, $id) {
        Reservation::create([
            'grouped_table_id' => $reservation['tablenumber'],
            'guest_id' => $id,
            'num_persons' => $reservation['num_persons'],
            'timespan' => 60,
            'reservation_time' => Carbon::create(
                $reservation['date'] .
                $reservation['time']
            )
        ]);

        $res = Reservation::with('guest')
                ->where('guest_id', $id)
                ->first();
        return $res;
    }

    public static function reservationUpdate($reservation) {
        Reservation::where("id", $reservation->id)->update([
            'num_persons' => $reservation->num_persons,
            'grouped_table_id' => $reservation->tablenumber,
            'reservation_time' => Carbon::create(
                $reservation->date .
                $reservation->time
            )
        ]);

    }

    public static function reservationDelete($reservation) {
        Reservation::where("id", $reservation)->delete();
    }
}
