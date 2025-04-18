<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alertes extends Component
{
    public $correcte;
    public $errors;
    
    public function __construct() {
        // Comprovem si hi ha missatges de sessió per mostrar.
        $this->correcte = session('correcte');

        // Comprovem si hi ha errors de sessió per mostrar.
        $this->errors = session('errors') ? session('errors')->all() : [];
    }

    public function render(): View|Closure|string
    {
        return view('components.alertes');
    }
}
