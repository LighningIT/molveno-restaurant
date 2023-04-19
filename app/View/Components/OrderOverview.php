<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderOverview extends Component
{
    private $tableSectionId;
    private $orderStatus;

    /**
     * Create a new component instance.
     */
    public function __construct($tableSectionId, $orderStatus)
    {
        $this->tableSectionId = $tableSectionId;
        $this->orderStatus = $orderStatus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-overview', [
            'tableSectionId' => $this->tableSectionId,
            'orderStatus' => $this->orderStatus,
        ]);
    }
}
