<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modalEditar extends Component
{
    public $idUsuario;

    /**
     * Create a new component instance.
     */
    public function __construct($idUsuario)
    {
        //
        $this->idUsuario = $idUsuario; 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.usuarios.modal-editar');
    }
}
