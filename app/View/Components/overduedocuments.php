<?php

namespace App\View\Components;

use Illuminate\View\Component;

class overduedocuments extends Component
{
    public $overduedocuments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($overduedocuments)
    {
        $this->overduedocuments=$overduedocuments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.overduedocuments');
    }
}
