<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller {
    public function logout() {
        Auth::logout(); // Tenca la sessió de l'usuari.

        return redirect()->route('index');
    }
}
