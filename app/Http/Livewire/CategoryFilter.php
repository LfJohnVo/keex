<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category;

    public function render()
    {
        $products = $this->category->products()->where('status', 2)->paginate(16);


        return view('livewire.category-filter', compact('products'));
    }
}
