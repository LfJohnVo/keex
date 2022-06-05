<?php

namespace App\Http\Livewire;

use App\Models\Size;
use App\Models\Color;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItemSize extends Component
{
    public $rowId, $qty, $quantity;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $color = Color::where('name', $item->options->color)->first();
        $size = Size::where('name', $item->options->size)->first();

        $this->quantity = qty_available($item->id, $color->id, $size->id);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        //protected listener on dropdown cart
        $this->emit('render');
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item-size');
    }
}
