<?php

namespace App\Http\Controllers;
use App\Models\Usuari;
use App\Repositories\UsuariRepository;
use Illuminate\Support\Facades\Auth;

class AdministrarUsuarisController extends Controller {

    protected $usuariRepository;

    public function __construct(UsuariRepository $usuariRepository) {
        $this->usuariRepository = $usuariRepository;
    }

    public function show() {
        $usuari = Auth::user();

        $usuaris = $this->usuariRepository->mostrarTotsElsUsuaris($usuari->id_usuari);

        return view("administrarUsuaris", compact("usuaris"));
    }

    public function esborrarUsuari($id) {
        $usuari = $this->usuariRepository->comprovarExistensiaDUsuariPerId($id);
        if (!$usuari) {
            return redirect()->route("administrarUsuaris")->withErrors("➤ No s'ha trobat l'usuari.");
        }

        $this->usuariRepository->esborrarUsuariPerId($usuari->id_usuari);

        return redirect()->route("administrarUsuaris")->with("correcte", "Usuari esborrat correctament.");
    }
}
