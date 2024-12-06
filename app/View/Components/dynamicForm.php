<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class dynamicForm extends Component
{
    public $category;
    /**
     * Create a new component instance.
     */
    public function __construct($category)
    {

        $this->$category = $category;
    }
    public function excrept($category, $limit = 100)
    {
        return Str::limit($category, $limit);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.CategoryTable');
    }
}
