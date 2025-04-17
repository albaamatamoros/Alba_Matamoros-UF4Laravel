<?php

namespace App\Repositories;

use App\Models\Usuari;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
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
            throw new Exception($e->getMessage());
        }
    }

    // Comprovar Usuari i Email
    public function comprovarUsuariIEmail($usuari, $email) {
        try {
            return Usuari::where('usuari', $usuari)
                ->orWhere('correu', $email)
                ->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Comprovem l'existència de l'usuari
    public function comprovarExistensiaDUsuari($usuari) {
        try {
            return Usuari::where('usuari', $usuari)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Comprovar la contrasenya per ID
    public function comprovarContrasenyaId($usuariId) {
        try {
            return Usuari::find($usuariId);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Comprovar si el nom d'usuari ja existeix (excepte per l'usuari actual)
    public function comprovarNomUsuariExistent($nomUsuari, $usuariId) {
        try {
            return Usuari::where('usuari', $nomUsuari)
                ->where('id_usuari', '!=', $usuariId)
                ->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function comprovarEmail($email){
        try {
            return Usuari::where('correu', $email)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }   
    }

    function comprovarToken($token) { 
        try {
            $currentTime = Carbon::now()->timestamp;
            return Usuari::where('token', $token)
                ->where('token_time', '>', $currentTime)
                ->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }  
    }

    function comprovarExistensiaDUsuariPerId($usuariId) {
        try {
            return Usuari::where('id_usuari', $usuariId)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
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
            throw new Exception($exception->getMessage());
        }
    }

    //Insertar Usuari per HybridAuth.
    function insertarNouUsuariHybridAuth($userProfile){  
    }

    //Insertar Usuari per HybridAuth.
    function insertarNouUsuariOAuth($usuari, $email, $nom, $cognom){
        try {
            Usuari::create([
                'nom' => $nom,
                'cognoms' => $cognom,
                'correu' => $email,
                'usuari' => $usuari,
                'contrasenya' => "",
                'administrador' => 0,
                'token' => "",
                'token_time' => 0,
                'autentificacio' => "Google"
            ]);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    //********************************************************
    //MODIFICAR

    //modificar la contrasenya de l'usuari.
    function modificarContrasenya($contrasenyaCifrada, $usuariId){
        try {
            $usuari = Usuari::findOrFail($usuariId);
            $usuari->update([
                'contrasenya' => $contrasenyaCifrada,
            ]);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    
    }

    function modificarNomUsuari($nomUsuari, $usuariId){
        try {
            $usuari = Usuari::findOrFail($usuariId);
            $usuari->update([
                'usuari' => $nomUsuari
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function modificarImatgePerfilUsuari($urlImatge, $usuariId) {
        try {
            $usuari = Usuari::findOrFail($usuariId);
            $usuari->update([
                'imatge' => $urlImatge
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function guardarToken($usuariId, $token, $expires) { 
        try {
            $usuari = Usuari::findOrFail($usuariId);
            $usuari->update([
                'token' => $token,
                'token_time' => $expires
            ]);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    //********************************************************
    //INICIAR SESSIÓN
    
    //Agafar les dades d'inici sessió.
    function iniciSessio($usuari){
    }

    function iniciSessioOAuth($usuari, $email){
        try {
            return Usuari::where('usuari', $usuari)
                ->where('correu', $email)
                ->where('autentificacio', 'Google')
                ->first();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    //********************************************************
    //ESBORRAR

    function esborrarUsuariPerId($idUsuari){
        try {
            $usuari = Usuari::findOrFail($idUsuari);
            $usuari->delete();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    //********************************************************
    //MOSTRAR USUARIS
    function mostrarTotsElsUsuaris($usuariId){
        try {
            return Usuari::where('id_usuari', '!=', $usuariId)
                ->where('administrador', 0)
                ->get();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}