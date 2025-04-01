<?php

namespace Database\Seeders;

use App\Models\Nota;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generar un numero aleatorio de notas para cada usuario
        $min = 1;
        $max = 6;
        $usuarios = Usuario::all();
        foreach ($usuarios as $usuario) {
            Nota::factory()->count(rand($min, $max))->create(['usuario_id' => $usuario->id]);
        }
    }
}
