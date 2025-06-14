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

                return redirect()->route('dashboard');
            } else {

                return back()->with('error', 'Crendenciales incorrectas');
            }
        } catch (\Throwable $th) {

            return back()->with('error', 'Crendenciales incorrectas');
        }
    }
}
