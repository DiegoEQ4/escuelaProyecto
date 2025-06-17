<?php

namespace App\Http\Controllers;

use App\Services\AuthServices;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthServices $authServices) {
        $this->service = $authServices;
    }

    //
    function showLogin(){
        return(view('auth.index'));
    }
    function auth(Request $request){
        return $this -> service -> login($request); 
    }
    function logout(Request $request){
        return $this -> service -> logout($request); 
    }
}
