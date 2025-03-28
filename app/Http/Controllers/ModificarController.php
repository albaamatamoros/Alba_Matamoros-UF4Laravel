<?php

namespace App\Http\Controllers;

class ModificarController extends Controller {
    public function show($id) {
        return view('modificar', ['id' => $id]);
    }

    public function modificarPersonatge() {
        
    }
}
