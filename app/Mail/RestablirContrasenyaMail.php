<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RestablirContrasenyaMail extends Mailable {
    public $token;

    public function __construct($token){
        $this->token = $token;
    }

    public function build() {
        $url = route('restablirContrasenya', ['token' => $this->token]);
    
        return $this->subject('Restabliment de contrasenya')
                    ->view('mail.restablirContrasenyaMail')
                    ->with(['resetUrl' => $url]);
    }
}