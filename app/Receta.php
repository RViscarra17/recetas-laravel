<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    
    //Campos que seran llenados por medio de los formularios
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id',
    ];

    //Obtiene las recetas asociadas al usuario via FK
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    //Obtiene el usuario que creo la receta via FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
