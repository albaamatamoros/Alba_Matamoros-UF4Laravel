<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UsuariRepository;

class PerfilController extends Controller {

    protected $usuariRepository;

    public function __construct(UsuariRepository $usuariRepository) {
        $this->usuariRepository = $usuariRepository;
    }

    public function show() {
        return view('perfil');
    }

    public function actualitzarPerfil(Request $request) {
        $usuari = Auth::user();

        $request->validate([
            'username' => 'nullable|string|max:255',
            'arxiu' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ], [
            'username.required' => '➤ El camp usuari es obligatori i no es pot deixar buit.',
            'arxiu.mimes' => '➤ Tipus d\'arxiu no permès. Només es permeten PNG i JPG.',
            'arxiu.max' => '➤ Mida màxima permesa: 2MB.',
        ]);

        $canvis = false;

        $usuariExistent = $this->usuariRepository->comprovarNomUsuariExistent($request->username, $usuari->id_usuari);

        if ($usuariExistent) {
            return redirect()->route('perfil')->withErrors(["usuariJaExistent" => "➤ Ja existeix un usuari amb aquest nom."]);
        }

        if ($request->username != $usuari->usuari) {
            $this->usuariRepository->modificarNomUsuari($request->username, $usuari->id_usuari);
            $canvis = true;
        }

        if ($request->hasFile('arxiu')) {
            $arxiu = $request->file('arxiu');
            $nomArxiu = time() . '.' . $arxiu->getClientOriginalExtension(); //Generar un nom d'arxiu únic
            $rutaRelativa = 'imatges-users/' . $nomArxiu;
    
            // Moure l'arxiu a la carpeta pública
            $arxiu->move(public_path('imatges-users'), $nomArxiu);
    
            // eliminar la imatge anterior si no és la imatge per defecte
            if ($usuari->imatge && $usuari->imatge !== 'imatges-users/defaultUser.jpg') {
                $ruta = public_path($usuari->imatge);
                if (file_exists($ruta) && is_file($ruta)) {
                    unlink($ruta);
                }
            }

            $this->usuariRepository->modificarImatgePerfilUsuari($rutaRelativa, $usuari->id_usuari);
            $canvis = true;
        }

        if (!$canvis) {
            return redirect()->route('perfil')->withErrors(["senseCanvis" => "➤ No s'ha fet cap canvi."]);
        }

        return redirect()->route('perfil')->with('correcte', '➤ Perfil actualitzat correctament.');
    }
}
