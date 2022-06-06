<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $contact;
    public $expenses; 
    public $value; 
    public function __construct($name,$contact,$expenses,$value)
    {
        $this->name=$name;
        $this->contact=$contact;
        $this->expenses=$expenses;
        $this->value=$value;
    }   
  

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
