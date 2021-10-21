<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Size;

class SizeProduct extends Component
{

    public $product, $name, $open = false;

    public $size, $name_edit;

    protected $listeners = ['delete'];

    protected $rules = [
        'name' => 'required'
    ];

    public function save()
    {
        $this->validate();

        $size = Size::where('product_id', $this->product->id)
            ->where('name', $this->name)
            ->first();

        if ($size) {
            $this->emit('errorSize', 'Esa talla ya existe');
            $this->alert('info', 'Esta talla ya existe', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        } else {

            $this->product->sizes()->create([
                'name' => $this->name
            ]);

            $this->alert('success', 'Talla añadida exitosamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }

        $this->reset('name');

        $this->product = $this->product->fresh();
    }


    public function edit(Size $size)
    {
        $this->open = true;
        $this->size = $size;
        $this->name_edit = $size->name;
    }

    public function update()
    {
        $this->validate([
            'name_edit' => 'required'
        ]);

        $this->size->name = $this->name_edit;
        $this->size->save();

        $this->alert('success', 'Datos actualizados correctamente', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);

        $this->product = $this->product->fresh();

        $this->open = false;
    }

    public function delete(Size $size)
    {
        $size->delete();
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        $sizes = $this->product->sizes;

        return view('livewire.admin.size-product', compact('sizes'));
    }
}
