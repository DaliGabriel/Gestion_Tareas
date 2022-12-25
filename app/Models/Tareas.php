<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'tags',
        'prioridad',
        'fecha'
    ];


    //Relacion con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    
    }

}
