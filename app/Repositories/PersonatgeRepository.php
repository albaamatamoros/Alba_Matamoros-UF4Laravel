<?php

namespace App\Repositories;

use App\Models\Personatge;
use Illuminate\Support\Facades\Hash;
use Exception;

class PersonatgeRepository {
    //INSERT
    //Inserir nou personatge.
    function inserir($nom, $text, $usuariId) {
    }

    //********************************************************
    //UPDATE

    //Modificar personatge.
    function modificar($nom, $text, $id) {
    }

    //********************************************************
    //DELETE

    //Esborrem personatge.
    function esborrar($nom) {
    }

    //esborrar personatge per id.
    function esborrarPerId($idPersonatge) {
    }

    //********************************************************
    //SELECT

    //Comprovacio per Nom.
    function selectComprovarNom($nom) {
        try {
            return Personatge::where('nom', $nom)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Obtenir id_personatge per el nom.
    function obtenerIdDelPersonatgePerNom($nom) {
    }

    //Comprovacio per id.
    function selectComprovarId($id) {
    }

    //Comprovar id i nom.
    function selectComprovarIdINom($id, $nom) {
    }

    //Comprovar si exsisteix un personatge amb nom i usuariID.
    function selectComprovarUsuariId($nom, $usuariId) {
        try {
            $personatge = Personatge::where('usuari_id', $usuariId)
                ->where('nom', $nom)
                ->first();
    
            return $personatge;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //Comprovacio d'un article en concret per id per poder fer modificació de les seves dades.
    function selectPersonatgePerId($id) {
    }


    //CONSULTAR
    //Mostrar tots els articles.
    function consultar() {
    }

    //Consultar personatges per usuari en concret.
    function consultarPerUsuari($usuariId) {
    }
}