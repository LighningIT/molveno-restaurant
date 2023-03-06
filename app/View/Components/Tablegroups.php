<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tablegroups extends Component
{
    private $id;
    private $table_section_id;
    private $combined;
    private $comments;
    private $chairs;
    private $status_id;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $table_section_id, $combined, $comments, $chairs, $status_id)
    {
        $this->id = $id;
        $this->table_section_id = $table_section_id;
        $this->combined = $combined;
        $this->comments = $comments;
        $this->chairs = $chairs;
        $this->status_id = $status_id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tablegroups', [
            'id'=> $this->id,
            'section_id' => $this->table_section_id,
            'combined' => $this->combined,
            'comments' => $this->comments,
            'chairs' => $this->chairs,
            'status_id' => $this->status_id,
        ]);
    }
}
