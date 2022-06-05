<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryProducts extends Component
{
    protected $listeners = ['render'];

    public $category;
    public $products = [];
    public $options = [];

    //LazyLoad function for products
    public function loadPosts()
    {
        //cargar productos dentro del array para renderizarlo despues
        $this->products = $this->category->products()->where('status', 2)->take(15)->get();
        //emitir evento de carga para volver a renderizar
        $this->emit('glider', $this->category->id);
    }

    public function render()
    {
        return view('livewire.category-products');
    }

    public function addItem($value)
    {
        $this->options['image'] = $value['images'][0]['url'];

        Cart::add([
            'id' => $value['id'],
            'name' => $value['name'],
            'qty' => '1',
            'price' => $value['price'],
            'weight' => 550,
            'options' => $this->options,
        ]);

    }
}
