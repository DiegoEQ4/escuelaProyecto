<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistasController extends Controller
{
    //
    function index(){
        return view('welcome');
    }
    function loginReturn(){
        return redirect()->route('login');
    }
}
