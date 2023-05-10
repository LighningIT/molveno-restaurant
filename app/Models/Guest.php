<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reservation() : HasOne {
        return $this->hasOne(Reservation::class);
    }

    public function getGuestInfo() {
        return $this->firstname;
    }

    public static function store($guest) {

        return Guest::create([
            'firstname' => $guest->firstname,
            'lastname' => $guest->lastname,
            'phone_number' => $guest->phonenumber,
            'hotel_guest' => $guest->hotelguest,
        ]);

    }

    public static function guestUpdate($guest) {

        Guest::where("id", $guest->id)->update([
            'firstname' => $guest->firstname,
            'lastname' => $guest->lastname,
            'phone_number' => $guest->phonenumber,
        ]);

    }

    public static function guestDelete($guest) {

        Guest::where("id", $guest)->delete();
    }

}
