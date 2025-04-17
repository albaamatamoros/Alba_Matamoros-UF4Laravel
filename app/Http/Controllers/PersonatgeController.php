<?php

namespace App\Http\Controllers;

use App\Models\Personatge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PersonatgeController extends Controller {
    public function show(Request $request) {
        $cerca = $request->input('search');
        $direccio = $request->get('direccio', 'asc');
        $personatgesPerPage = $request->get('personatgesPerPage', 5);

        if (Auth::check()) {
            $query = Personatge::where('usuari_id', Auth::id());
        } else {
            $query = Personatge::query();
        }

        if ($cerca) {
            $query->where('nom', 'like', '%' . $cerca . '%');
        }

        // Afegim ordenació i paginació
        $personatges = $query->orderBy('nom', $direccio)
            ->paginate($personatgesPerPage)
            ->appends([
                'search' => $cerca,
                'direccio' => $direccio,
                'personatgesPerPage' => $personatgesPerPage
            ]);
    
        return view('index', compact('personatges', 'direccio', 'personatgesPerPage'));
    }
}
