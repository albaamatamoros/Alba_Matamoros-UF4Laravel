<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PersonatgeRepository;
use Illuminate\Support\Facades\Auth;

class ModificarController extends Controller {

    protected $personatgeRepository;

    public function __construct(PersonatgeRepository $personatgeRepository) {
        $this->personatgeRepository = $personatgeRepository;
    }

    // Un cop l'usuari ha seleccionat el personatge que vol modificar, es redirigeix a aquesta funció.
    public function show($nom) {

        $personatge = $this->personatgeRepository->obtenerIdDelPersonatgePerNom($nom);
        if (!$personatge) {
            return back()->withErrors(["➤ No existeix cap personatge amb aquest Nom."])->withInput();
        }

        return view('modificar', [ 'personatge' => $personatge ]);
    }

    // Aquesta funció es fa servir per modificar un personatge des de la vista d'inici.
    public function modificarPersonatge(Request $request, $personatgeId) {
        //Obtenim l'usuari autenticat.
        $usuari = Auth::user();

        $request->validate([
            'nom' => 'required|string|max:30',
            'text' => 'required|string|max:1000',
        ], [
            'nom.max' => '➤ Nom massa llarg (màxim 30 caràcters).',
            'text.max' => '➤ Descripció massa llarga (màxim 1000 caràcters).',
            'nom.required' => '➤ El camp nom no pot ser buit',
            'text.required' => '➤ El camp descripcio no pot ser buit',
        ]);

        $personatge = $this->personatgeRepository->selectComprovarId($personatgeId);
        if (!$personatge) {
            return back()->withErrors(["➤ No existeix cap personatge amb aquest Id."])->withInput();
        }

        $personatgeUsuari = $this->personatgeRepository->selectComprovarUsuariPerId($personatgeId, $usuari->id_usuari);
        if (!$personatgeUsuari) {
            return back()->withErrors(["➤ No pots modificar un personatge que no es teu."])->withInput();
        }

        $this->personatgeRepository->modificar($request->nom, $request->text, $personatgeId);
        return redirect()->route('cercar')->with('correcte', 'Personatge modificat correctament!');
    }
}
