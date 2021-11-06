<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class Credenciales extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $password;


    public function __construct($name, $email, $password)
    {
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
    }

    public function build(){
      $name = $this->name;
      $email = $this->email;
      $password = $this->password;

      return $this->subject('Universidad Ecotec | Admisiones Posgrado')
      ->view('mails.postulante_usuario', compact('name', 'email', 'password'));
    }
}
