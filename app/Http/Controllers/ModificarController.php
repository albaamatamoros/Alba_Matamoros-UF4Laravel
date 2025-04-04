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

    public function show($nom) {

        $personatge = $this->personatgeRepository->obtenerIdDelPersonatgePerNom($nom);
        if (!$personatge) {
            return back()->withErrors(["➤ No existeix cap personatge amb aquest Nom."])->withInput();
        }

        return view('modificar', [ 'personatge' => $personatge ]);
    }

    public function modificarPersonatge(Request $request, $personatgeId) {
        //Obtenim l'usuari autenticat.
        $usuari = Auth::user();

        $request->validate([
            'nom' => 'required|string|max:255',
            'text' => 'required|string|max:255',
        ], [
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
