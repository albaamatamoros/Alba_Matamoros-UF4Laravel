<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PersonatgeRepository;
use App\Models\Personatge;
use Illuminate\Support\Facades\Auth;
use Exception;

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

    // CERCA PERSONATGE
    // Aquesta funció busca un personatge per nom i comprova si l'usuari autenticat és el propietari d'aquest personatge.
    public function cercarPersonatge(Request $request) {
        try {
            //Obtenim l'usuari autenticat.
            $usuari = Auth::user();

            $request->validate([
                'nom' => 'required|string|max:30',
            ], [
                'nom.max' => '➤ Nom massa llarg (màxim 30 caràcters).',
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
        } catch (Exception $e) {
            throw new Exception("S'ha produït un error inesperat en cercar el personatge.: " . $e->getMessage());
            return back()->withErrors(['general' => "➤ S'ha produit un error inesperat. Torna-ho a intentar més tard."]);
        }
    }
}
