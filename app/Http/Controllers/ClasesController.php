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

    public function index () {

    }
}
