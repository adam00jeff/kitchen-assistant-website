<?php

namespace App\View\Components;

use Illuminate\View\Component;

class showincidentreports extends Component
{
    public $incidentreports;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($incidentreports)
    {
        $this->incidentreports = $incidentreports;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.showincidentreports');
    }
}
