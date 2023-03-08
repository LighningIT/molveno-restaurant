<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function create($guest) : int {
        $newGuest = Guest::create([
            'firstname' => $guest->firstname,
            'lastname' => $guest->lastname,
            'phone_number' => $guest->phonenumber,
            'hotel_guest' => $guest->hotelguest,
        ]);
        return $newGuest;
    }

}
