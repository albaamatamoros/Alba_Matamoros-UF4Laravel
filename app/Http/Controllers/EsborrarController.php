<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PersonatgeRepository;
use Illuminate\Support\Facades\Auth;
use Exception;

class EsborrarController extends Controller {

    protected $personatgeRepository;

    public function __construct(PersonatgeRepository $personatgeRepository) {
        $this->personatgeRepository = $personatgeRepository;
    }
    
    public function show() {
        return view('esborrar');
    }

    public function esborrarPersonatge(Request $request) {
        try {

            $usuari = Auth::user();

            $request->validate([
                'nom' => 'required|string|max:30',
            ], [
                'nom.max' => '➤ Nom massa llarg (màxim 30 caràcters).',
                'nom.required' => '➤ El camp Nom està buit.',
            ]);

            $personatge = $this->personatgeRepository->selectComprovarNom($request->nom);
            
            if (!$personatge) {
                return back()->withErrors(["➤ No existeix cap personatge amb aquest Nom."])->withInput();
            }

            $personatgeUsuari = $this->personatgeRepository->selectComprovarUsuariId($request->nom, $usuari->id_usuari);

            if (!$personatgeUsuari) {
                return back()->withErrors(["➤ No pots esborrar un personatge que no es teu."])->withInput();
            }

            $this->personatgeRepository->esborrar($request->nom);

            return redirect()->route('esborrar')->with('correcte', 'Personatge esborrat correctament!');
        } catch (Exception $e) {
            throw new Exception("S'ha produït un error inesperat en esborrar el personatge.: " . $e->getMessage());
            return back()->withErrors(['general' => "➤ S'ha produit un error inesperat. Torna-ho a intentar més tard."]);
        }
    }

    // Aquesta funció esborra un personatge per ID i comprova si l'usuari autenticat és el propietari d'aquest personatge.
    // Aquesta funció es fa servir per esborrar un personatge des de la vista d'inici.
    public function esborrarPersonatgeInici($id) {
        try {
            $personatge = $this->personatgeRepository->selectComprovarId($id);

            if (!$personatge) {
                return back()->withErrors(["➤ No existeix cap personatge amb aquest ID."])->withInput();
            }

            $personatgeUsuari = $this->personatgeRepository->selectComprovarUsuariPerId($id, Auth::user()->id_usuari);

            if (!$personatgeUsuari) {
                return back()->withErrors(["➤ No pots esborrar un personatge que no es teu."])->withInput();
            }

            $this->personatgeRepository->esborrarPerId($id);

            return redirect()->route('index')->with('correcte', 'Personatge esborrat correctament!');
        } catch (Exception $e) {
            throw new Exception("S'ha produït un error inesperat en esborrar el personatge.: " . $e->getMessage());
            return back()->withErrors(['general' => "➤ S'ha produit un error inesperat. Torna-ho a intentar més tard."]);
        }
    }
}
