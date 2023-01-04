<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{

    public $title;
    public $image;
    public $alt;
    public $description;
    public $price;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alt,$description,$image = 'menu1.jpg',$price,$title)
    {
        //
        $this->alt = $alt;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
