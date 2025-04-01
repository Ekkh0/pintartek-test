<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $title;
    public $name;
    public $placeholder;
    public $type;
    public $value;

    # this component need atleast id and name to be used otherwise the rest is already defaulted
    public function __construct($id, $name, $value = NULL, $title = '', $placeholder = '', $type = 'text')
    {
        $this->id = $id;
        $this->title = $title;
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
