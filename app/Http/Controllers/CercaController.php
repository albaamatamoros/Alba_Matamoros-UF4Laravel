<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PersonatgeRepository;
use App\Models\Personatge;
use Illuminate\Support\Facades\Auth;

class CercaController extends Controller {
    protected $personatgeRepository;
    protected $personatge;

    public function __construct(PersonatgeRepository $personatgeRepository, Personatge $personatge) {
        $this->personatgeRepository = $personatgeRepository;
        $this->personatge = $personatge;
    }

    public function show() {
        return view('cercar');
    }

    public function cercarPersonatge(Request $request) {
        //Obtenim l'usuari autenticat.
        $usuari = Auth::user();

        $request->validate([
            'nom' => 'required|string|max:255',
        ], [
            'nom.required' => '➤ Has de omplenar el nom per poder buscar el personatge que vols modificar.',
        ]);

        $personatge = $this->personatgeRepository->selectComprovarNom($request->nom);

        if (!$personatge) {
            return back()->withErrors(["➤ No existeix cap personatge amb aquest Nom."])->withInput();
        }

        $personatgeUsuari = $this->personatgeRepository->selectComprovarUsuariId($request->nom, $usuari->id_usuari);

        if (!$personatgeUsuari) {
            return back()->withErrors(["➤ No pots modificar un personatge que no es teu."])->withInput();
        }

        //Enviar el personatge al controlador que muestra la vista para mostrar los datos del personatge.
        return redirect()->route('modificar', ['nom' => $personatge->nom]);
    }
}
