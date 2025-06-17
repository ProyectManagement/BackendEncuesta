<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;

class Encuesta extends EloquentModel
{
    use HasFactory;

    // Conexión a MongoDB
    protected $connection = 'mongodb';

    // Nombre de la colección en MongoDB
    protected $collection = 'encuestas';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'id_alumno', // Referencia al alumno
        'numero_hijos',
        'depende_economicamente',
        'religion',
        'grupo_sanguineo',
        'fecha_nacimiento',
        'edad',
        'pais_nacimiento',
        'estado_nacimiento',
        'municipio_nacimiento',
        'telefono_celular',
        'telefono_casa',
        'correo_personal',
        'redes_sociales',
        'direccion',
        'referencias_domicilio',
        'contacto_emergencia_1',
        'contacto_emergencia_2',
        'aspectos_socioeconomicos',
        'aportantes_gasto_familiar',
        'edad_integrantes_familia',
        'condiciones_salud',
        'analisis_academico',
        'expectativas_educativas_ocupacionales'
    ];

    // Relación con Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', '_id');
    }
}