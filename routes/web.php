<?php

//CONTROLADORES

use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\DetalleAsistenciaController;
use App\Http\Controllers\GradosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\EstudiantesGradoController;
use App\Http\Controllers\MateriaDetalleController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InicioController;


use Illuminate\Support\Facades\Route;



Route::get('/',[VistasController::class,'loginReturn'])->name('index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login/auth', [AuthController::class, 'auth'])->name('login.auth');


Route::middleware(['auth'])->group(function () {
    Route::post('/login/auth/logout', [AuthController::class, 'logout'])->name('login.logout');

    //ASISTENCIAS 
    Route::get('/asistencias',[AsistenciasController::class,'index'])->name('asistencias.index');
    Route::post('/asistencias/store',[AsistenciasController::class,'store'])->name('asistencias.store');
    
    //DETALLE ASISTENCIA
    Route::get('/detalle_asistencia/{id}',[DetalleAsistenciaController::class,'index'])->name('detalle_asistencia.index');
    Route::post('/detalle_asistencia/store',[DetalleAsistenciaController::class,'store'])->name('detalle_asistencia.store');

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
    Route::post('/profesores/update',[ProfesoresController::class,'update'])->name('profesores.update');
    Route::get('/profesores/{id}',[ProfesoresController::class,'delete'])->name('profesores.delete');

    //MANEJO DE CLASES  
    Route::get('/clases',[ClasesController::class,'index'])->name('clases.index');
    Route::post('/clases/store',[ClasesController::class,'store'])->name('clases.store');
    Route::get('/clases/delete/{id}',[ClasesController::class,'delete'])->name('clases.delete');

    Route::get('/index', [InicioController::class, 'index']) ->name('dashboard');
});


