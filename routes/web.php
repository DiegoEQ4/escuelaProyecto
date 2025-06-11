<?php

//CONTROLADORES

use App\Http\Controllers\GradosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\UsuariosController;


use Illuminate\Support\Facades\Route;


Route::get('/',[VistasController::class,'index']);


//MANEJO DDE MATERIAS 
Route::get('/materias',[MateriasController::class,'index'])->name('materias.index');
Route::post('/materias',[MateriasController::class,'store'])->name('materias.store');
Route::post('/materias/update',[MateriasController::class,'update'])->name('materias.update');
Route::get('/materias/delete/{id}',[MateriasController::class,'delete'])->name('materias.delete');


//MANEJO DE USUARIOS 
Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::post('/usuarios',[UsuariosController::class,'store'])->name('usuarios.store');
Route::post('/usuarios/update/{id}',[UsuariosController::class,'update'])->name('usuarios.update');
Route::get('/usuarios/delete/{id}',[UsuariosController::class,'delete'])->name('usuarios.delete');



//MANEJO DE GRADOS

Route::get('/grados',[GradosController::class,'index'])->name('grados.index');
