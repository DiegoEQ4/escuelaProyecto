<?php

namespace App\Services;

use App\Models\Estudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthServices
{
    function login(Request $request)
    {
        try {
            $credenciales = [
                'nombreUsuario' => $request->username,
                'password' => $request->password
            ];

            if (Auth::attempt($credenciales, false)) {
                $request->session()->regenerate();
                $usuario = Auth::user();
                session([
                    'tipo'=>$usuario->tipo,
                    'nombreUsuario'=>$usuario->nombreUsuario,
                    'idUsuario'=>$usuario->idUsuario
                ]);

                return redirect()->route('dashboard');
            } else {

                return back()->with('error', 'Crendenciales incorrectas');
            }
        } catch (\Throwable $th) {

            return back()->with('error', 'Crendenciales incorrectas');
        }
    }


    function logout(Request $request){
        try {
            
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login');

        } catch (\Throwable $th) {
            echo var_dump($th);
        }
    }
}
