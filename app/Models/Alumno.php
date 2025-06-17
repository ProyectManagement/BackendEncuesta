<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;

class Alumno extends EloquentModel
{
    use HasFactory;

    // Conexión a MongoDB
    protected $connection = 'mongodb';

    // Nombre de la colección en MongoDB
    protected $collection = 'alumnos';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'id_alumno',
        'id_grupo',
        'id_carrera',
        'programa_educativo',
        'curp',
        'rfc',
        'sexo',
        'genero',
        'estado_civil'
    ];

    // Relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', '_id');
    }

    // Relación con Carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', '_id');
    }
}