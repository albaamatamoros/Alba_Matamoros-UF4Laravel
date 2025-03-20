<?php

namespace App\Repositories;

use App\Models\Usuari;
use Illuminate\Support\Facades\Hash;

class UsuariRepository {

    //Comprovar Usuari I Contrasenya exsistent.
    public function comprovarUsuariIContrasenya($usuari, $contrasenya) {
        $usuari = Usuari::where('usuari', $usuari)->first();
        return $usuari && Hash::check($contrasenya, $usuari->contrasenya) ? $usuari : null;
    }

    //Comprovar Usuari I Email.
    function comprovarUsuariIEmail($usuari, $email){
        return Usuari::where('usuari', $usuari)
        ->orWhere('correu', $email)
        ->first();
    }

    //comprovem l'usuari i agafem la contrasenya.
    function comprovarExistensiaDUsuari($usuari){
        return Usuari::where('usuari', $usuari)->first();
    }

    //Comprovar la contrasenya per id.
    function comprovarContrasenyaId($usuariId){
        return Usuari::find($usuariId);   
    }

    function comprovarNomUsuariExistent($nomUsuari, $usuariId){
          return Usuari::where('usuari', $nomUsuari)
            ->where('id_usuari', '!=', $usuariId)
            ->first();
    }

    function comprovarEmail($email){   
    }

    function comprovarToken($token) { 
    }
    

    //********************************************************
    //INSERT

    //Insertar nou Usuari.
    function insertarNouUsuari($nom, $cognoms, $usuari, $email, $contrasenya){   
    }

    //Insertar Usuari per HybridAuth.
    function insertarNouUsuariHybridAuth($userProfile){  
    }

    //Insertar Usuari per HybridAuth.
    function insertarNouUsuariOAuth($usuari, $email, $nom, $cognom){
    }

    //********************************************************
    //MODIFICAR

    //modificar la contrasenya de l'usuari.
    function modificarContrasenya($contrasenyaCifrada, $usuariId){
    }

    function modificarNomUsuari($nomUsuari, $usuariId){
    }

    function modificarImatgePerfilUsuari($urlImatge, $usuariId) {
    }

    function guardarToken($email, $token, $expires) {  
    }

    //********************************************************
    //INICIAR SESSIÓN
    
    //Agafar les dades d'inici sessió.
    function iniciSessio($usuari){
    }

    function iniciSessioOAuth($usuari, $email){
    }

    //********************************************************
    //ESBORRAR

    function esborrarUsuariPerId($idUsuari){
    }

    //********************************************************
    //MOSTRAR USUARIS
    function mostrarTotsElsUsuaris($usuariId){
    }
}