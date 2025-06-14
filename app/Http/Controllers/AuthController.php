<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function showLogin(){
        return(view('auth.index'));
    }
    function auth(){
        return redirect()->route('index');
    }
}
