<?php

namespace App\View\Components;

use Illuminate\View\Component;

class onmenuallergens extends Component
{
    public $allergens;
    public $stocks;
    public $recipes;
    public $suppliers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($allergens, $stocks, $recipes, $suppliers)
    {
        $this->allergens=$allergens;
        $this->recipes=$recipes;
        $this->stocks=$stocks;
        $this->suppliers=$suppliers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.onmenuallergens');
    }
}
