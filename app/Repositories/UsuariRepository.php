<?php

namespace App\Repositories;

use App\Models\Usuari;
use Illuminate\Support\Facades\Hash;
use Exception;

class UsuariRepository {

    //Comprovar Usuari I Contrasenya exsistent.
    public function comprovarUsuariIContrasenya($usuari, $contrasenya) {
        try {
            $usuari = Usuari::where('usuari', $usuari)->first();
            if ($usuari && Hash::check($contrasenya, $usuari->contrasenya)) {
                return $usuari;
            }
            return null;
        } catch (Exception $e) {
            throw new Exception("Error en comprovar usuari i contrasenya: " . $e->getMessage());
        }
    }

    // Comprovar Usuari i Email
    public function comprovarUsuariIEmail($usuari, $email) {
        try {
            return Usuari::where('usuari', $usuari)
                ->orWhere('correu', $email) // Usamos 'correu' para que coincida con la columna de la base de datos
                ->first();
        } catch (Exception $e) {
            throw new Exception("Error en comprovar usuari i correu: " . $e->getMessage());
        }
    }

    // Comprovem l'existència de l'usuari
    public function comprovarExistensiaDUsuari($usuari) {
        try {
            return Usuari::where('usuari', $usuari)->first();
        } catch (Exception $e) {
            throw new Exception("Error en comprovar l'existència de l'usuari: " . $e->getMessage());
        }
    }

    // Comprovar la contrasenya per ID
    public function comprovarContrasenyaId($usuariId) {
        try {
            return Usuari::find($usuariId);
        } catch (Exception $e) {
            throw new Exception("Error en comprovar la contrasenya per ID: " . $e->getMessage());
        }
    }

    // Comprovar si el nom d'usuari ja existeix (excepte per l'usuari actual)
    public function comprovarNomUsuariExistent($nomUsuari, $usuariId) {
        try {
            return Usuari::where('usuari', $nomUsuari)
                ->where('id_usuari', '!=', $usuariId)
                ->first();
        } catch (Exception $e) {
            throw new Exception("Error en comprovar si el nom d'usuari existeix: " . $e->getMessage());
        }
    }

    function comprovarEmail($email){   
    }

    function comprovarToken($token) { 
    }
    

    //********************************************************
    //INSERT

    //Insertar nou Usuari.
    public function insertarNouUsuari($nom, $cognoms, $usuari, $email, $contrasenya){
        try {
            Usuari::create([
                'nom' => $nom,
                'cognoms' => $cognoms,
                'correu' => $email,
                'usuari' => $usuari,
                'contrasenya' => $contrasenya,
                'administrador' => 0,
                'token' => "",
                'token_time' => 0,
                'autentificacio' => ""
            ]);

        } catch (Exception $exception) {
            throw new Exception("Error en inserir l'usuari: " . $exception->getMessage());
        }
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