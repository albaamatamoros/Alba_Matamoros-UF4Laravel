<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UsuariRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RestablirContrasenyaMail;

class CanviarContrasenyaController extends Controller {

    protected $usuariRepository;

    public function __construct(UsuariRepository $usuariRepository) {
        $this->usuariRepository = $usuariRepository;
    }

    public function show() {
        return view('canviarContrasenya');
    }

    public function show2() {
        return view('contrasenyaOblidada');
    }

    // CANVIAR CONTRASENYA

    public function canviarContrasenya(Request $request) {
        $usuari = Auth::user();

        $request->validate([
            'contrasenya_actual' => 'required',
            'nova_contrasenya' => [
                'required',
                'different:contrasenya_actual',
                'same:confirmar_contrasenya',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/'
            ],
            'confirmar_contrasenya' => 'required',
        ], [
            'contrasenya_actual.required' => "➤ El camp 'contrasenya_actual' és obligatori.",
            'nova_contrasenya.required' => "➤ El camp 'nova_contrasenya' és obligatori.",
            'nova_contrasenya.different' => "➤ Aquesta ja és la teva actual contrasenya.",
            'nova_contrasenya.same' => "➤ Nova contrasenya i confirmar contrasenya no són iguals.",
            'nova_contrasenya.regex' => "➤ El format de la contrasenya no és correcte.",
            'confirmar_contrasenya.required' => "➤ El camp 'confirmar_contrasenya' és obligatori.",
        ]);


        $usuari = $this->usuariRepository->comprovarContrasenyaId($usuari->id_usuari);
        if (!$usuari) {
            return back()->withErrors(['usuari' => '➤ No existeix aquest usuari.']);
        }

        if (!Hash::check($request->contrasenya_actual, $usuari->contrasenya)) {
            return back()->withErrors(['contrasenya_actual' => '➤ La contrasenya actual no és correcta.']);
        }

        $contrasenyaCifrada = Hash::make($request->nova_contrasenya);
        $this->usuariRepository->modificarContrasenya($contrasenyaCifrada, $usuari->id_usuari);

        return redirect()->route('canviarContrasenya')->with('correcte', 'Contrasenya canviada correctament.');
    }

    // RESTABLIR CONTRASENYA OBLIDADA

    public function contrasenyaOblidada(Request $request) {
        $request->validate([
            'email' => 'required',
        ], [
            'email.required' => "➤ El format de l'email no és correcte.",
        ]);

        $usuari = $this->usuariRepository->comprovarEmail($request->email);
        if (!$usuari) {
            return back()->withErrors(['email' => '➤ No existeix aquest usuari.']);
        }

        if ($usuari->autentificacio != "") {
            return back()->withErrors(['email' => '➤ Aquest usuari ha iniciat sessió amb una plataforma externa, no es pot canviar la contrasenya.']);
        }

        $token = Str::random(60);
        $expire = time() + 3600;

        $this->usuariRepository->guardarToken($usuari->id_usuari, $token, $expire);

        Mail::to($request->email)->send(new RestablirContrasenyaMail($token));

        return redirect()->route('contrasenyaOblidada')->with('correcte', "S'ha enviat un correu electrònic amb les instruccions per a restablir la teva contrasenya.");
    }

    public function restablirContrasenya($token) {
        $usuari = $this->usuariRepository->comprovarToken($token);
        if (!$usuari) {
            return redirect()->route('contrasenyaOblidada')->withErrors(['token' => '➤ El token no és vàlid o ha caducat.']);
        }

        return view('restablirContrasenya');
    }

    public function restablirCanviContrasenya(){

    }
}
