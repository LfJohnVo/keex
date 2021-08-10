<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItem extends Component
{
    public $qty = 1;

    public function decrement(){
        $this->qty = $this->qty -1;
    }

    public function increment(){
        $this->qty = $this->qty +1;
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
