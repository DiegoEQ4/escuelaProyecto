<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Verificamos si ya existe el admin para evitar duplicados
        $existe = DB::table('usuarios')->where('nombreUsuario', 'admin')->exists();

        if (!$existe) {
            DB::table('usuarios')->insert([
                'nombreUsuario' => 'admin',
                'contrasena' => Hash::make('admin123'), // Encripta la contraseña con bcrypt
                'tipo' => 3, // Tipo 1 = Administrador (según tu lógica)
                'habilitado' => 1
            ]);
        }
    }
}
