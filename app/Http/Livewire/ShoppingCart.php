<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.shopping-cart');
    }

    public function destroy()
    {
        Cart::destroy();
        $this->emitTo('dropdown-cart', 'render');
    }

    public function delete($rowID)
    {
        Cart::remove($rowID);
        $this->emitTo('dropdown-cart', 'render');
    }
}
