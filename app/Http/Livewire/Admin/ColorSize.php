<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;

class ColorSize extends Component
{

    public $colors, $color_id, $quantity, $open = false;

    protected $rules = [
        'color_id' => 'required',
        'quantity' => 'required|numeric'
    ];

    public function mount()
    {
        $this->colors = Color::get();
    }

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.admin.color-size');
    }
}
