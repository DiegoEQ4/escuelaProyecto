<?php

namespace App\Http\Controllers;

use App\Services\ClasesServices;
use Illuminate\Http\Request;

class ClasesController extends Controller
{

    public $service;

    public function __construct(ClasesServices $clasesService) {
        $this->service = $clasesService;
    }

    public function store (Request $request) {
        $this->service->crearClase($request);
        return back();
    }
    public function delete (int $id) {
        $this->service->deshabilitarClases($id);
        return back();
    }
}
