<?php

use App\CategoriaReceta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaReceta::create([
            'nombre' => 'Comida Mexicana',
        ]);

        CategoriaReceta::create([
            'nombre' => 'Comida Italiana',
        ]);

        CategoriaReceta::create([
            'nombre' => 'Comida Argentina',
        ]);

        CategoriaReceta::create([
            'nombre' => 'Postres',
        ]);

        CategoriaReceta::create([
            'nombre' => 'Cortes',
        ]);

        CategoriaReceta::create([
            'nombre' => 'Ensaladas',
        ]);

        CategoriaReceta::create([
            'nombre' => 'Desayunos',
        ]);
    }
}
