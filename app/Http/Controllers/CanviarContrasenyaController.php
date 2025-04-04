<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CanviarContrasenyaController extends Controller {
    public function show() {
        return view('canviarContrasenya');
    }

    public function show2() {
        return view('contrasenyaOblidada');
    }

}
