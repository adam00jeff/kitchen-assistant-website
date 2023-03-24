<?php

namespace App\View\Components;

use Illuminate\View\Component;

class allergensearch extends Component
{
    public $allergens;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($allergens)
    {
        $this->allergens = $allergens;
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
