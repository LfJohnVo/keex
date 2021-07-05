<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{

    public $category;
    public $products = [];

    //LazyLoad function for products
    public function loadPosts(){
        //cargar productos dentro del array para renderizarlo despues
        $this->products = $this->category->products;
        //emitir evento de carga para volver a renderizar
        $this->emit('glider');
    }

    public function render()
    {
        return view('livewire.category-products');
    }
}