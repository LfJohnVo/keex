<?php

namespace App\Http\Livewire;

use App\Mail\ContactEmail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PHPMailer\PHPMailer\PHPMailer;

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

        $to = 'vojohn95@gmail.com'; // aqui coloca el email de quien recibira el correo
        $from_email = 'test@hostinger-tutorials.com';
        $subject = 'Correo recibido desde la web keex';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: $from_email" . "\r\n" .
            "Reply-To: $from_email" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();
        $message = '<body><h1>KEEX - Mensaje</h1><p>Este es un <strong> mensaje recibido desde la web KEEX.</strong>.</p>
        <p>Nombre: ' . $this->nombre . '</p>
        <p>Email: ' . $this->email . '</p>
        <p>Mensaje: ' . $this->mensaje . '</p>
        <p></a></p></body>';
        mail($to, $subject, $message, $headers);

        $this->alert('success', 'Mensaje enviado', [
            'position' => 'top-end',
            'timer' => '4000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);


        $this->reset();
    }
}
