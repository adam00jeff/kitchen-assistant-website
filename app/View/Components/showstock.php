<?php

namespace App\View\Components;

use Illuminate\View\Component;

class showstock extends Component
{
    public $stocks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($stocks)
    {
        $this->stocks=$stocks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.showstock');
    }
}
