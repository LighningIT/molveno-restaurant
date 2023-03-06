<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
