<?php

namespace App\Http\Controllers;
use App\Repositories\UsuariRepository;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdministrarUsuarisController extends Controller {

    protected $usuariRepository;

    public function __construct(UsuariRepository $usuariRepository) {
        $this->usuariRepository = $usuariRepository;
    }

    public function show() {
        try {
            // Comprovem si l'usuari és administrador, si no ho és, redirigim a la vista d'error 403
            if (Auth::user()->administrador == 0) {
                abort(403);
            }

            $usuari = Auth::user();

            $usuaris = $this->usuariRepository->mostrarTotsElsUsuaris($usuari->id_usuari);

            return view("administrarUsuaris", compact("usuaris"));
        } catch (Exception $e) {
            throw new Exception("S'ha produït un error inesperat en mostrar els usuaris.: " . $e->getMessage());
            return back()->withErrors(['general' => "➤ S'ha produit un error inesperat. Torna-ho a intentar més tard."]);
        }
    }

    public function esborrarUsuari($id) {
        try {
            $usuari = $this->usuariRepository->comprovarExistensiaDUsuariPerId($id);

            if (!$usuari) {
                return redirect()->route("administrarUsuaris")->withErrors("➤ No s'ha trobat l'usuari.");
            }

            $this->usuariRepository->esborrarUsuariPerId($usuari->id_usuari);

            return redirect()->route("administrarUsuaris")->with("correcte", "Usuari esborrat correctament.");
        } catch (Exception $e) {
            throw new Exception("S'ha produït un error inesperat en esborrar l'usuari.: " . $e->getMessage());
            return back()->withErrors(['general' => "➤ S'ha produit un error inesperat. Torna-ho a intentar més tard."]);
        }
    }
}
