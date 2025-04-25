<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\PersonatgeRepository;
use Illuminate\Support\Facades\Cookie;
use Exception;

class PersonatgeController extends Controller {

    protected $personatgeRepository;

    public function __construct(PersonatgeRepository $personatgeRepository) {
        $this->personatgeRepository = $personatgeRepository;
    }

    public function show(Request $request) {
        try {
            $cerca = $request->input('search');
            $ordenacio = $request->get('ordenacio', Cookie::get('ordenacio', 'asc'));
            $personatgesPerPage = $request->get('personatgesPerPage', Cookie::get('personatgesPerPage', 5));

            // Guardem en cookies les preferències de l'usuari
            if ($request->has('ordenacio')) {
                Cookie::queue('ordenacio', $ordenacio, 60 * 24 * 30);
            }
            if ($request->has('personatgesPerPage')) {
                Cookie::queue('personatgesPerPage', $personatgesPerPage, 60 * 24 * 30);
            }

            //  Si s'accedeix a la ruta /consultar, no es filtra per usuari.
            if (request()->is('consultar')) {
                $usuariId = null;
            } else {
                $usuariId = Auth::check() ? Auth::id() : null;
            }

            $personatges = $this->personatgeRepository->paginacio($personatgesPerPage, $ordenacio, $cerca, $usuariId);

            // Si s'accedeix a la ruta /consultar, es mostra la vista consultar.blade.php
            if (request()->is('consultar')) {
                return view('consultar', compact('personatges', 'ordenacio', 'personatgesPerPage'));
            } else {
                return view('index', compact('personatges', 'ordenacio', 'personatgesPerPage'));
            }
        } catch (Exception $e) {
            throw new Exception("S'ha produït un error inesperat durant la cerca: " . $e->getMessage());
            return back()->withErrors(['general' => "➤ S'ha produit un error inesperat. Torna-ho a intentar més tard."]);
        }
    }
}
