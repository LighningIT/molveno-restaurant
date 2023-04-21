<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildSeat extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public static function store($chairtype) {
        if (ChildSeat::create(["type" => $chairtype])) {
            return true;
        }
        
    
    }

    public static function getAllChildSeats() {
        $seats = ChildSeat::get();
        return $seats->groupBy('type');
    }

  
}
