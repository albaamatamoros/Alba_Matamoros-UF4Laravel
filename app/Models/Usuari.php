<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuari extends Authenticatable {

    use Notifiable;

    // Desactiva els camps automàtics created_at i updated_at.
    public $timestamps = false;
    
    protected $table = 'usuaris';
    protected $primaryKey = 'id_usuari';

    protected $fillable = [
        'nom',
        'cognoms',
        'correu',
        'usuari',
        'contrasenya',
        'imatge',
        'administrador',
        'token',
        'token_time',
        'autentificacio'
    ];

    // Oculta les dades de la contrasenya en respostes JSON.
    protected $hidden = ['contrasenya'];

    // Relació: un usuari pot tenir molts personatges.
    public function personatges() {
        return $this->hasMany(Personatge::class, 'usuari_id'); // Clau forània taula personatges.
    }
}
