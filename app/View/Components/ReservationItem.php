<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReservationItem extends Component
{

    private $guest;
    private $tableNumber;
    private $numberPersons;
    private $reservationTime;
    private $checkedIn;

    /**
     * Create a new component instance.
     */
    public function __construct($guest, $tableNumber, $numberPersons, $reservationTime)
    {
        $this->guest = $guest;
        $this->tableNumber = $tableNumber;
        $this->numberPersons = $numberPersons;
        $this->reservationTime = $reservationTime;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.reservation-item', [
        "guest"=>$this->guest,
        "tableNumber"=>$this->tableNumber,
        "reservationTime"=>$this->reservationTime,
        "numberPersons"=>$this->numberPersons,
        ]);

    }
}
