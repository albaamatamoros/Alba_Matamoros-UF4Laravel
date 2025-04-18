<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UsuariRepository;
use App\Models\Usuari;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    protected $usuariRepository;

    public function __construct(UsuariRepository $usuariRepository) {
        $this->usuariRepository = $usuariRepository;
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        // Agafem les dades de l'usuari de Google
        $googleUsuari = Socialite::driver('google')->user();
        $usuari = $googleUsuari->user;

        $nom = $usuari['given_name'] ?? null;
        $cognom = $usuari['family_name'] ?? null;
        $email = $googleUsuari->getEmail();
        $user = explode('@', $email)[0];

        $usuariExistent = $this->usuariRepository->iniciSessioOAuth($user, $email);

        // Si no existeix l'usuari, el creem
        if (!$usuariExistent) {
            $this->usuariRepository->insertarNouUsuariOAuth($user, $email, $nom, $cognom);
            $usuariExistent = $this->usuariRepository->iniciSessioOAuth($user, $email);
        }

        // Inicia sesión
        Auth::login($usuariExistent);

        return redirect()->route('index');
    }
}
