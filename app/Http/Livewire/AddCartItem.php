<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddCartItem extends Component
{
    public $product, $quantity;
    public $qty = 1;
    public $options = [];

    public function mount()
    {
        $this->quantity = $this->product->quantity;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function addItem()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->added($this->product->name, $this->qty);
        //emit event to specific component
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }

    public function added($value, $qty)
    {
        $this->alert('success', $qty . ' ' . $value . ' añadido al carrito', [
            'position' =>  'bottom-end',
            'timer' =>  '2000',
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'OK',
            'cancelButtonText' =>  '',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  true,
        ]);
    }
}
