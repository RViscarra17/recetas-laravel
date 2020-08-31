<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index() 
    {

        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        $nuevas = Receta::latest()->take(6)->get();

        $categorias = CategoriaReceta::all();

        $recetas = [];

        foreach ($categorias as $categoria) {
            $recetas[Str::slug($categoria->nombre)][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
        }


        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
