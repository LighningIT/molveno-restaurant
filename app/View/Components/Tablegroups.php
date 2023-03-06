<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tablegroups extends Component
{
    private $id;
    private $tableSectionId;
    private $combined;
    private $comments;
    private $chairs;
    private $statusId;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $tableSectionId, $combined, $comments, $chairs, $statusId)
    {
        $this->id = $id;
        $this->tableSectionId = $tableSectionId;
        $this->combined = $combined;
        $this->comments = $comments;
        $this->chairs = $chairs;
        $this->statusId = $statusId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tablegroups', [
            'id'=> $this->id,
            'tableSectionId' => $this->tableSectionId,
            'combined' => $this->combined,
            'comments' => $this->comments,
            'chairs' => $this->chairs,
            'statusId' => $this->statusId
        ]);
    }
}
