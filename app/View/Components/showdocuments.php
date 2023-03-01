<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showdocuments extends Component
{
    public $documents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($documents)
    {
        $this->documents=$documents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.showdocuments');
    }
}
