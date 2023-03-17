<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    private $firstname;
    private $lastname;
    private $phoneNumber;
    private $hotelGuest;

    function __construct($firstname, $lastname, $phoneNumber, $hotelGuest = false) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phoneNumber = $phoneNumber;
        $this->hotelGuest = $hotelGuest;
    }

    public function getGuestInfo() {
        return $this->firstname;
    }

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
