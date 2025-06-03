<?php

use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Route;

Route::get('/',[VistasController::class,'index']);
Route::get('/materias',[VistasController::class,'materiaView']);
