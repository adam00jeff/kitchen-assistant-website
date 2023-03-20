<?php

namespace App\View\Components;

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
    public $stock;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($suppliers, $instock, $stock)
    {
        $this->suppliers=$suppliers;
        $this->instock=$instock;
        $this->stock=$stock;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.supplierreports');
    }
}
