<?php

namespace App\View\Components;

use Illuminate\View\Component;

class allergensearch extends Component
{
    public $allergens;
    public $stocks;
    public $suppliers;
    public $recipes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($allergens, $stocks, $suppliers, $recipes)
    {
        $this->allergens = $allergens;
        $this->suppliers=$suppliers;
        $this->recipes=$recipes;
        $this->stocks=$stocks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.allergensearch');
    }
}
