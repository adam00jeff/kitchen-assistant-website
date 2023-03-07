<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showstock extends Component
{
    public $stocks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $suppliers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($stocks, $suppliers)
    {
        $this->stocks=$stocks;
        $this->suppliers=$suppliers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.showstock');
    }
}
