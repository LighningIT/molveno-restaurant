<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class ReservationItem extends Component
{

    private $guest;
    private $tableNumber;
    private $numberPersons;
    private $reservationTime;

    /**
     * Create a new component instance.
     */
    public function __construct($guest, $tableNumber, $numberPersons, $reservationTime)
    {
        $this->guest = $guest;
        $this->tableNumber = $tableNumber;
        $this->numberPersons = $numberPersons;
        $this->reservationTime = $reservationTime->format("d-m-Y H:i");
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.reservation-item', [
            'guest' => $this->guest,
            'tableNumber' => $this->tableNumber,
            'numberPersons' => $this->numberPersons,
            'reservationTime' => $this->reservationTime,
        ]);
    }
}
