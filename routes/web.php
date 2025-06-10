<?php

use App\Http\Controllers\VistasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/',[VistasController::class,'index']);
Route::get('/materias',[VistasController::class,'materiaView']);

//MANEJO DE USUARIOS 
Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::post('/usuarios',[UsuariosController::class,'store'])->name('usuarios.store');
Route::post('/usuarios/update/{id}',[UsuariosController::class,'update'])->name('usuarios.update');
Route::get('/usuarios/delete/{id}',[UsuariosController::class,'delete'])->name('usuarios.delete');
