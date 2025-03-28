<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePicker extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $name;
    public $placeholder;
    public $highlightToday;
    public $value;

    public function __construct($id, $title, $name, $value = NULL, $placeholder = '', $highlightToday = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->highlightToday = $highlightToday;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.date-picker');
    }
}
