<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class supplierreports extends Component
{
    public $suppliers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $instock;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $stocks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($suppliers, $instock, $stocks)
    {
        $this->suppliers=$suppliers;
        $this->instock=$instock;
        $this->stocks=$stocks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.supplierreports');
    }
}
