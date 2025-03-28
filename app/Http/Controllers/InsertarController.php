<?php

namespace App\Http\Controllers;

use App\Repositories\PersonatgeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InsertarController extends Controller {

    protected $personatgeRepository;

    public function __construct(PersonatgeRepository $personatgeRepository) {
        $this->personatgeRepository = $personatgeRepository;
    }

    public function show() {
        return view('insertar');
    }

    public function insertarPersonatge(Request $request) {
        $usuari = Auth::user();

        $request->validate([
            'nom' => 'required|string|max:255',
            'cos' => 'required|string|max:1000',
        ], [
            'nom.required' => '➤ El camp Nom està buit.',
            'cos.required' => '➤ El camp Text està buit.',
        ]);
    }
}
