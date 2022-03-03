<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ContactForm extends Component
{
    use LivewireAlert;

    public $nombre;
    public $email;
    public $mensaje;

    protected $rules = [
        'nombre' => 'required',
        'email' => 'required',
        'mensaje' => 'required',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function enviar()
    {
        $rules = $this->rules;
        $this->validate($rules);

        $this->alert('success', 'Mensaje enviado', [
            'position' => 'top-end',
            'timer' => '4000',
            'toast' => true,
            'timerProgressBar' => true,
           ]);

        $this->reset();
    }
}
