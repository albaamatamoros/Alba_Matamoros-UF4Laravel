<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personatge extends Model {
    protected $table = 'personatges';
    protected $primaryKey = 'id_personatge';

    protected $fillable = [
        'nom',
        'cos',
        'usuari_id'
    ];

    // Relació: un personatge pertany a un usuari.
    public function usuari() {
        return $this->belongsTo(Usuari::class, 'usuari_id'); // Clau forània taula personatges.
    }

    // Aquesta relacio permet fer consultes mes sencilles utilitzant el Model Personatge. 
}
