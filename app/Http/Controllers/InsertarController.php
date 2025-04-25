<?php

namespace App\Http\Controllers;

use App\Repositories\PersonatgeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class InsertarController extends Controller {

    protected $personatgeRepository;

    public function __construct(PersonatgeRepository $personatgeRepository) {
        $this->personatgeRepository = $personatgeRepository;
    }

    public function show() {
        return view('insertar');
    }

    public function insertarPersonatge(Request $request) {
        try {
            $usuari = Auth::user();

            // Validem les dades del formulari.
            $request->validate([
                'nom' => 'required|string|max:30',
                'text' => 'required|string|max:1000',
            ], [
                'nom.max' => '➤ Nom massa llarg (màxim 30 caràcters).',
                'text.max' => '➤ Descripció massa llarga (màxim 1000 caràcters).',
                'nom.required' => '➤ El camp Nom està buit.',
                'text.required' => '➤ El camp Descripció està buit.',
            ]);

            $personatge = $this->personatgeRepository->selectComprovarNom($request->nom);

            if ($personatge) {
                return back()->withErrors(["➤ Ja exsisteix un personatge amb aquest Nom."])->withInput();
            }

            $this->personatgeRepository->inserir($request->nom, $request->text, $usuari->id_usuari);
            return redirect()->route('insertar')->with('correcte', 'Personatge inserit correctament!');
        } catch (Exception $e) {
            throw new Exception("S'ha produït un error inesperat en insertar el personatge.: " . $e->getMessage());
            return back()->withErrors(['general' => "➤ S'ha produit un error inesperat. Torna-ho a intentar més tard."]);
        }
    }
}
