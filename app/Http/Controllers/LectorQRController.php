<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LectorQRController extends Controller {
    public function show() {
        return view('lectorQR');
    }
}
