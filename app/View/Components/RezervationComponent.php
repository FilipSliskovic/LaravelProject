<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RezervationComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $tableName;
    public $dateTime;
    public $seats;
    public $id;


    public function __construct(string $tableName,$dateTime, $seats,$id)
    {
        $this->tableName = $tableName;
        $this->dateTime = $dateTime;
        $this->seats = $seats;
        $this->id = $id;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rezervation-component');
    }
}
