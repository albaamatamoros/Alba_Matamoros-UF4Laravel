<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArxiuPirataController extends Controller {
    public function show() {
        return view('arxiuPirata', ['personatges' => []]);
    }

    public function obtenirPersonatges(Request $request) {
        $filtre = $request->input('filtre');

        // URL de la API de One Piece
        $apiOnePiece = "https://api.api-onepiece.com/v2/characters/en";
        
        $response = Http::get($apiOnePiece);

        // Comprovem si la resposta és correcta
        if (!$response->successful()) {
            return response()->json(['error' => 'No s\'han pogut obtenir les dades de l\'API'], 500);
        }

        // Decodificar el JSON a un array
        $personatges = $response->json();

        // Secogns el filtre seleccionat, obtenim els personatges corresponents
        if ($filtre === "Marine") {
            $personatges = $this->obtenirMarines($personatges);
        } elseif ($filtre === "Pirates") {
            $personatges = $this->obtenirPirates($personatges);
        }

        $personatges = array_map(function ($character) {
            return [
                'name' => isset($character['name']) && $character['name'] !== '' ? $character['name'] : 'Desconegut',
                'bounty' => isset($character['bounty']) && $character['bounty'] !== '' ? $character['bounty'] : 'Sense Recompensa',
                'crew' => isset($character['crew']['name']) && $character['crew']['name'] !== '' ? $character['crew']['name'] : 'Sense tripulació',
                'fruit' => isset($character['fruit']['name']) && $character['fruit']['name'] !== '' ? $character['fruit']['name'] : 'Sense fruita',
            ];
        }, $personatges);

        // Retornar los personajes a la vista
        return view('arxiuPirata', ['personatges' => $personatges]);
    }


    public function obtenirMarines($personatges) {
        // Filtrar els personatges per aquells que són Marines
        return array_filter($personatges, function($character) {
            return isset($character['crew']['name']) && strpos(strtolower($character['crew']['name']), 'marine') !== false;
        });
    }

    public function obtenirPirates($personatges) {
        // Filtrar els personatges per aquells que són Pirates
        return array_filter($personatges, function($character) {
            $bounty = isset($character['bounty']) && $character['bounty'] !== '' ? $character['bounty'] : 'sense recompensa';

            return $bounty !== 'sense recompensa';
        });
    }

}
