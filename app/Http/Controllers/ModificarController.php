<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PersonatgeRepository;
use Illuminate\Support\Facades\Auth;

class ModificarController extends Controller {

    protected $personatgeRepository;

    public function __construct(PersonatgeRepository $personatgeRepository) {
        $this->personatgeRepository = $personatgeRepository;
    }

    public function show($nom) {

        $personatge = $this->personatgeRepository->obtenerIdDelPersonatgePerNom($nom);
        if (!$personatge) {
            return back()->withErrors(["➤ No existeix cap personatge amb aquest Nom."])->withInput();
        }

        return view('modificar', [ 'personatge' => $personatge ]);
    }

    public function modificarPersonatge() {
        
    }
}
