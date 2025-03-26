<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alertes extends Component
{
    public $correcte;
    public $errors;
    
    public function __construct()
    {
        $this->correcte = session('correcte');

        $this->errors = session('errors') ? session('errors')->all() : [];
    }

    public function render(): View|Closure|string
    {
        return view('components.alertes');
    }
}
