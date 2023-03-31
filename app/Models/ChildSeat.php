<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildSeat extends Model
{
    use HasFactory;

    public static function getAllChildSeats() {
        $seats = ChildSeat::get();
        return $seats->groupBy('type');
    }
}
