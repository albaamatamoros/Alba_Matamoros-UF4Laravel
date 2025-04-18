<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UsuariRepository;

class RegistrarController extends Controller {

    protected $usuariRepository;

    public function __construct(UsuariRepository $usuariRepository)
    {
        $this->usuariRepository = $usuariRepository;
    }

    public function show() {
        return view('registrarse');
    }

    public function registreUsuari(Request $request) {
        // Validació de camps.
        $request->validate([
            'nom' => 'required|string|max:30',
            'cognoms' => 'required|string|max:100',
            'usuari' => 'required|string|max:30|unique:usuaris,usuari',
            'correu' => 'required|max:100|email|unique:usuaris,correu',
            'contrasenya' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/'
            ],
            'confirmar_contrasenya' => 'required|same:contrasenya',
        ], [
            'nom.max' => "➤ Nom massa llarg (màxim 30 caràcters)",
            'cognoms.max' => "➤ Cognoms massa llargs (màxim 100 caràcters)",
            'usuari.max' => "➤ Nom d'usuari massa llarg (màxim 30 caràcters)",
            'usuari.unique' => "➤ Nom d'usuari ja registrat",
            'correu.max' => "➤ Correu massa llarg (màxim 100 caràcters)",
            'correu.unique' => "➤ Correu ja registrat",
            'nom.required' => "➤ El camp 'nom' és obligatori",
            'cognoms.required' => "➤ El camp 'cognoms' és obligatori",
            'usuari.required' => "➤ El camp 'usuari' és obligatori",
            'usuari.unique' => "➤ Aquest usuari ja està registrat",
            'correu.required' => "➤ El camp 'correu' és obligatori",
            'correu.email' => "➤ El correu no és vàlid",
            'correu.unique' => "➤ Aquest correu ja està registrat",
            'contrasenya.required' => "➤ El camp 'contrasenya' és obligatori",
            'contrasenya.min' => "➤ La contrasenya ha de tenir almenys 8 caràcters",
            'contrasenya.regex' => "➤ La contrasenya ha de tenir almenys una minúscula, una majúscula, un número i un caràcter especial",
            'confirmar_contrasenya.required' => "➤ El camp 'confirmar contrasenya' és obligatori",
            'confirmar_contrasenya.same' => "➤ Contrasenya i confirmar contrasenya no coincideixen",
        ]);
    
        // Comprovar si l'usuari o correu ja existeixen.
        if ($this->usuariRepository->comprovarUsuariIEmail($request->usuari, $request->correu)) {
            return back()->withErrors(["➤ Aquest usuari o correu ja existeix"])->withInput();
        }
    
        // Cifrar la contrasenya
        $contrasenyaCifrada = Hash::make($request->contrasenya);
    
        // Insertar nou usuari
        $this->usuariRepository->insertarNouUsuari(
            $request->nom,
            $request->cognoms,
            $request->usuari,
            $request->correu,
            $contrasenyaCifrada
        );
    
        return redirect()->route('registre')->with('correcte', 'Usuari registrat correctament!');
    }
}
