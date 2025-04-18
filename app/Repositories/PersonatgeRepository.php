<?php

namespace App\Repositories;

use App\Models\Personatge;
use Illuminate\Support\Facades\Hash;
use Exception;

class PersonatgeRepository {
    //INSERT
    //Inserir nou personatge.
    function inserir($nom, $text, $usuariId) {
        try {
            Personatge::create([
                'nom' => $nom,
                'cos' => $text,
                'usuari_id' => $usuariId,
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //********************************************************
    //UPDATE

    //Modificar personatge.
    function modificar($nom, $text, $idPersonatge) {
        try {
            $personatge = Personatge::findOrFail($idPersonatge);
            $personatge->update([
                'nom' => $nom,
                'cos' => $text,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //********************************************************
    //DELETE

    //Esborrem personatge.
    public function esborrar($nom) {
        try {
            return Personatge::where('nom', $nom)->delete();
        } catch (\Exception $e) {
            throw new \Exception("Error al eliminar el personatge: " . $e->getMessage());
        }
    }

    //esborrar personatge per id.
    function esborrarPerId($idPersonatge) {
        try {
            return Personatge::where('id_personatge', $idPersonatge)->delete();
        } catch (\Exception $e) {
            throw new \Exception("Error al eliminar el personatge: " . $e->getMessage());
        }
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
        try {
            return Personatge::where('nom', $nom)->first();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        } 
    }

    //Comprovacio per id.
    function selectComprovarId($idPersonatge) {
        try {
            return Personatge::where('id_personatge', $idPersonatge)->first();
        } catch (\Exception $e) {
            throw new Exception('Error: ' . $e->getMessage());
        }
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

    function selectComprovarUsuariPerId($idPersonatge, $usuariId) {
        try {
            return $personatge = Personatge::where('usuari_id', $usuariId)
            ->where('id_personatge', $idPersonatge)
            ->first();    
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    //********************************************************
    //PAGINACIÓ

    function paginacio($personatgesPerPage, $ordenacio, $cerca, $usuariId) {
        try {
            $query = Personatge::query();

            if ($usuariId) {
                $query->where('usuari_id', $usuariId);
            }

            if ($cerca) {
                $query->where('nom', 'like', '%' . $cerca . '%');
            }

            return $query->orderBy('nom', $ordenacio)
                ->paginate($personatgesPerPage)
                ->appends([
                    'search' => $cerca,
                    'ordenacio' => $ordenacio,
                    'personatgesPerPage' => $personatgesPerPage
                ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}