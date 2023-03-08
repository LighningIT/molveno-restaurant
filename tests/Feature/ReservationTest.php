<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ReservationController;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;


class ReservationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_reservations_route(): void
    {
        $response = $this->get('/reservations');
        $response->assertStatus(200);
    }

    public function test_create_reservation() : void {
        $dt = Carbon::now()->locale('nl_NL');

        $data = new Request();
        $data->guest->firstname = "first";
        $data->guest->lastname = "last";
        $data->guest->phone_number = '06-12345678';
        $data->guest->num_persons = 2;

        $data->reservation->date = $dt->format('Y-m-d');
        $data->reservation->time = $dt->format('H:i');
        $data->reservation->numberofpersons = random_int(1, 20);
        $data->reservation->hotel_guest = false;

        ReservationController::create($data);
    }
}
