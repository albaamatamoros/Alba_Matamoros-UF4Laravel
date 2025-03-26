<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Repositories\UsuariRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {

    protected $usuariRepository;

    public function __construct(UsuariRepository $usuariRepository) {
        $this->usuariRepository = $usuariRepository;
    }

    public function show() {
        return view('auth.login');
    }

    public function loginUsuari(Request $request) {
        
        // Validació de camps.
        $request->validate([
            'usuari' => 'required',
            'contrasenya' => 'required',
        ], [
            'usuari.required' => '➤ No pots iniciar sessió amb un usuari buit.',
            'contrasenya.required' => '➤ Et cal una contrasenya per iniciar sessió.',
        ]);

        // Busquem l'usuari per comprovar si existeix.
        $usuari = $this->usuariRepository->comprovarExistensiaDUsuari($request->usuari);

        // Si l'usuari no existeix.
        if (!$usuari) {
            return back()->withErrors(['usuari' => '➤ No existeix aquest usuari']);
        }

        // Si la contrasenya no es correcta.
        if (!Hash::check($request->contrasenya, $usuari->contrasenya)) {
            return back()->withErrors(['contrasenya' => '➤ La contrasenya no és correcta']);
        }

        Auth::login($usuari);

        // Si se marca "Recordar", guardar una cookie con el nombre de usuario
        if ($request->has('recordam')) {
            Cookie::queue('usuariNom', $request->usuari, 60 * 24 * 30);  // Cookie válida por 30 días
        } else {
            Cookie::queue(Cookie::forget('usuariNom'));  // Si no se marca "Recordar", eliminar la cookie
        }

        return redirect()->route('index');
    }

    // // Validar el reCAPTCHA
    // private function validarRecaptcha($recaptchaResposta) {
    //     $secretKey = '6LeA3owqAAAAAAgYe7JC6GOVbaR46dHA0gOa2jeO';
    //     $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResposta");
    //     $responseKeys = json_decode($response, true);
    //     return !$responseKeys["success"];
    // }
}
