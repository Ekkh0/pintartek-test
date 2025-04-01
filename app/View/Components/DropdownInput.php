<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $name;
    public $placeholder;
    public $options;
    public $value;

    # options can be filled with an associative array with keys ['key1' => 'value1'] so it can display text and fill the needed value separately in the component
    public function __construct($id, $title, $name, $options, $value = NULL, $placeholder = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown-input');
    }
}
