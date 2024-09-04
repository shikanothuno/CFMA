<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlaneLayout extends Component
{
    public string $title;
    public string $css;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $css = "")
    {
        $this->title = $title;
        $this->css = $css;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.plane-layout');
    }
}
