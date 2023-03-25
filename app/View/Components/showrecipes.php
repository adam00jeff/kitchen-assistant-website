<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showrecipes extends Component
{
    public $stocks;
    public $recipes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($recipes, $stocks)
    {
       $this->recipes=$recipes;
       $this->stocks=$stocks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.showrecipes');
    }
}
