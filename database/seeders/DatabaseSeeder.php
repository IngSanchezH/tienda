<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //llenado de los datos del administrador
        $admin = new Administrador();
        $admin->usuario = 'admin';
        $admin->nombre = 'Feliciano Sanchez';
        $admin->telefono = '9981428125';
        $admin->email = 'felicianos137@gmail.com';
        $admin->pass = Hash::make('admin123');
        $admin->save();

        //llenado de los datos del cliente
        $cliente = new Cliente();
        $cliente->usuario = 'cliente';
        $cliente->nombre = 'Feliciano';
        $cliente->telefono = '9981428125';
        $cliente->email = 'felicianos@hotmail.com';
        $cliente->pass = Hash::make('admin123');
        $cliente->direccion = 'conocido';
        $cliente->colonia = 'gardenias';
        $cliente->municipio = 'palenque';
        $cliente->ciudad = 'palenque';
        $cliente->estado = 'Chiapas';

        $cliente->save();
    }
}
