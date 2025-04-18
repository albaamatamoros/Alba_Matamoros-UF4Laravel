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
        $usuariNom = Cookie::get('usuariNom');
        return view('auth.login', compact('usuariNom'));
    }

    public function showPersonatge($id) {
        return view('auth.login');
    }

    public function loginUsuari(Request $request) {
        // Validació de camps.
        $request->validate([
            'usuari' => 'required|string|max:30',
            'contrasenya' => 'required',
        ], [
            'usuari.max' => '➤ Nom d\'usuari massa llarg (màxim 30 caràcters).',
            'usuari.required' => '➤ No pots iniciar sessió amb un usuari buit.',
            'contrasenya.required' => '➤ Et cal una contrasenya per iniciar sessió.',
        ]);

        // Comprovar si cal validar el reCAPTCHA
        if (session("loginRecaptcha") >= 3) {
            $recaptchaResponse = $request->input("g-recaptcha-response");
            $secretKey = "6LeA3owqAAAAAAgYe7JC6GOVbaR46dHA0gOa2jeO"; // Clau secreta reCAPTCHA

            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
            $captchaSuccess = json_decode($verify, true);

            if (!$captchaSuccess["success"]) {
                return back()->withErrors(['g-recaptcha-response' => '➤ Error amb el reCAPTCHA. Torna-ho a intentar.']);
            }
        }

        // Busquem l'usuari per comprovar si existeix.
        $usuari = $this->usuariRepository->comprovarExistensiaDUsuari($request->usuari);

        // Si no existeix l'usuari.
        if (!$usuari) {
            return back()->withErrors(['usuari' => '➤ No existeix aquest usuari']);
        }

        // Si la contrasenya no es correcta.
        if (!Hash::check($request->contrasenya, $usuari->contrasenya)) {
            session(['loginRecaptcha' => session('loginRecaptcha', 0) + 1]);
            return back()->withErrors(['contrasenya' => '➤ La contrasenya no és correcta']);
        }

        // Autenticació correcta → reiniciar el comptador
        session(['loginRecaptcha' => 0]);

        Auth::login($usuari);

        if ($request->has('recorda')) {
            Cookie::queue('usuariNom', $request->usuari, 60 * 24 * 30);  // Cookie 30 días
        }

        return redirect()->route('index');
    }
}
