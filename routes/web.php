<?php

//CONTROLADORES

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\GradosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\EstudiantesGradoController;
use App\Http\Controllers\MateriaDetalleController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\UsuariosController;


use Illuminate\Support\Facades\Route;


Route::get('/index',[VistasController::class,'index'])->name('index');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login.view');
Route::post('/login/auth', [AuthController::class, 'auth'])->name('login.auth');

//MANEJO DDE MATERIAS 
Route::get('/materias',[MateriasController::class,'index'])->name('materias.index');
Route::post('/materias',[MateriasController::class,'store'])->name('materias.store');
Route::post('/materias/update',[MateriasController::class,'update'])->name('materias.update');
Route::get('/materias/delete/{id}',[MateriasController::class,'delete'])->name('materias.delete');


//DETALLE MATERIAS
Route::get('/materias/detalle/{carnet}',[MateriaDetalleController::class,'index'])->name('materia_detalle.index');
Route::post('/materias/detalle/',[MateriaDetalleController::class,'store'])->name('materia_detalle.store');
Route::post('/materias/detalle/update',[MateriaDetalleController::class,'udpate'])->name('materia_detalle.update');
Route::get('/materias/detalle//delete/{id}',[MateriaDetalleController::class,'delete'])->name('materia_detalle.delete');

//MANEJO DE USUARIOS 
Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::post('/usuarios',[UsuariosController::class,'store'])->name('usuarios.store');
Route::post('/usuarios/update/{id}',[UsuariosController::class,'update'])->name('usuarios.update');
Route::get('/usuarios/delete/{id}',[UsuariosController::class,'delete'])->name('usuarios.delete');



//MANEJO DE GRADOS
Route::get('/grados',[GradosController::class,'index'])->name('grados.index');
Route::post('/grados',[GradosController::class,'store'])->name('grados.store');
Route::post('/grados/update',[GradosController::class,'update'])->name('grados.update');
Route::get('/grados/{id}',[GradosController::class,'delete'])->name('grados.delete');


//GRADOS ESTUDIANTES
Route::get('/grados/estudiante/{id}',[EstudiantesGradoController::class,'index'])->name('estudiante_grado.index');
Route::post('/grados/estudiante/add/{id}',[EstudiantesGradoController::class,'store'])->name('estudiante_grado.store');
Route::get('/grados/estudiante/delete/{id}',[EstudiantesGradoController::class,'delete'])->name('estudiante_grado.delete');

//MANEJO DE ESTUDIANTES

Route::get('/estudiantes',[EstudiantesController::class,'index'])->name('estudiantes.index');
Route::post('/estudiantes',[EstudiantesController::class,'update'])->name('estudiantes.update');
Route::get('/estudiantes/{id}',[EstudiantesController::class,'delete'])->name('estudiantes.delete');


//MANEJO DE PROFESORES

Route::get('/profesores',[ProfesoresController::class,'index'])->name('profesores.index');
Route::post('/profesores',[ProfesoresController::class,'update'])->name('profesores.update');
Route::get('/profesores/{id}',[ProfesoresController::class,'delete'])->name('profesores.delete');

//MANEJO DE CLASES  
Route::get('/clases',[ClasesController::class,'index'])->name('clases.index');