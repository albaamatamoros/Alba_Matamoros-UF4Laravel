<?php

namespace App\Http\Controllers;

use App\Repositories\PersonatgeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InsertarController extends Controller {

    protected $personatgeRepository;

    public function __construct(PersonatgeRepository $personatgeRepository) {
        $this->personatgeRepository = $personatgeRepository;
    }

    public function show() {
        return view('insertar');
    }

    public function insertarPersonatge(Request $request) {
        $usuari = Auth::user();
        dd($usuari);

        $request->validate([
            'nom' => 'required|string|max:255',
            'text' => 'required|string|max:1000',
        ], [
            'nom.required' => '➤ El camp Nom està buit.',
            'text.required' => '➤ El camp Descripció està buit.',
        ]);

        $personatge = $this->personatgeRepository->selectComprovarNom($request->nom);

        if ($personatge) {
            return back()->withErrors(["➤ Ja exsisteix un personatge amb aquest Nom."])->withInput();
        }

        $this->personatgeRepository->inserir($request->nom, $request->text, $usuari->id_usuari);
        return redirect()->route('insertar')->with('correcte', 'Personatge inserit correctament!');
    }
}
