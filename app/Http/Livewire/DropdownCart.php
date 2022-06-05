<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownCart extends Component
{
    //listen the event from addcartitem
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.dropdown-cart');
    }
}
