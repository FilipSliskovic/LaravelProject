<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $image;
    public $parentId;
    public $description;
    public $alt;


    public function __construct($description,$image,$parentId,$title)
    {

        $this->alt = $title;
        $this->description = $description;
        $this->image = $image;
        $this->parentId = $parentId;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-card');
    }
}
