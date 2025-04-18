<?php

namespace App\Http\Controllers;

class LectorQRController extends Controller {

    // Aquest controler s'encarrega de gestionar el lector de QR
    // En construcció, no fa res, només es fa servir per mostrar la vista del lector de QR
    public function show() {
        return view('lectorQR');
    }
}
