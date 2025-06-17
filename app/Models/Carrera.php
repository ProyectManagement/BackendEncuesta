<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;

class Carrera extends EloquentModel
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'carreras';

    protected $fillable = [
        'nombre', // Nombre de la carrera (Ejemplo: "Ingeniería en Desarrollo de Software")
    ];
}
