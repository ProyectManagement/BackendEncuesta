<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;
use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Carrera;

class EncuestaController extends Controller
{
    public function showForm()
    {
        // Obtener todos los grupos y carreras desde MongoDB
        $grupos = Grupo::all();
        $carreras = Carrera::all();

        // Retornar la vista con los datos
        return view('encuesta', compact('grupos', 'carreras'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            // Datos del alumno
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'nullable|string',
            'id_alumno' => 'nullable|string',
            'id_grupo' => 'required',
            'id_carrera' => 'required',
            'programa_educativo' => 'nullable|string',
            'curp' => 'nullable|string',
            'rfc' => 'nullable|string',
            'sexo' => 'nullable|string',
            'genero' => 'nullable|string',
            'estado_civil' => 'nullable|string',
            // Datos de la encuesta
            'numero_hijos' => 'nullable|integer',
            'depende_economicamente' => 'nullable|string',
            'religion' => 'nullable|string',
            'grupo_sanguineo' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'edad' => 'nullable|integer',
            'pais_nacimiento' => 'nullable|string',
            'estado_nacimiento' => 'nullable|string',
            'municipio_nacimiento' => 'nullable|string',
            'telefono_celular' => 'nullable|string',
            'telefono_casa' => 'nullable|string',
            'correo_personal' => 'nullable|email',
            'redes_sociales' => 'nullable|string',
            'direccion' => 'nullable|array',
            'referencias_domicilio' => 'nullable|array',
            'contacto_emergencia_1' => 'nullable|array',
            'contacto_emergencia_2' => 'nullable|array',
            'aspectos_socioeconomicos' => 'nullable|array',
            'aportantes_gasto_familiar' => 'nullable|array',
            'edad_integrantes_familia' => 'nullable|array',
            'condiciones_salud' => 'nullable|array',
            'analisis_academico' => 'nullable|array',
            'expectativas_educativas_ocupacionales' => 'nullable|array',
        ]);

        // Guardar la información personal del alumno
        $alumno = Alumno::create([
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'id_alumno' => $validated['id_alumno'],
            'id_grupo' => $validated['id_grupo'],
            'id_carrera' => $validated['id_carrera'],
            'programa_educativo' => $validated['programa_educativo'],
            'curp' => $validated['curp'],
            'rfc' => $validated['rfc'],
            'sexo' => $validated['sexo'],
            'genero' => $validated['genero'],
            'estado_civil' => $validated['estado_civil'],
            'fecha_nacimiento' => $validated['fecha_nacimiento']
        ]);

        // Guardar los datos de la encuesta
        $encuesta = Encuesta::create([
            'id_alumno' => $alumno->_id, // Referencia al alumno recién creado
            'numero_hijos' => $validated['numero_hijos'],
            'depende_economicamente' => $validated['depende_economicamente'],
            'religion' => $validated['religion'],
            'grupo_sanguineo' => $validated['grupo_sanguineo'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'edad' => $validated['edad'],
            'pais_nacimiento' => $validated['pais_nacimiento'],
            'estado_nacimiento' => $validated['estado_nacimiento'],
            'municipio_nacimiento' => $validated['municipio_nacimiento'],
            'telefono_celular' => $validated['telefono_celular'],
            'telefono_casa' => $validated['telefono_casa'],
            'correo_personal' => $validated['correo_personal'],
            'redes_sociales' => $validated['redes_sociales'],
            'direccion' => $validated['direccion'],
            'referencias_domicilio' => $validated['referencias_domicilio'],
            'contacto_emergencia_1' => $validated['contacto_emergencia_1'],
            'contacto_emergencia_2' => $validated['contacto_emergencia_2'],
            'aspectos_socioeconomicos' => $validated['aspectos_socioeconomicos'],
            'aportantes_gasto_familiar' => $validated['aportantes_gasto_familiar'],
            'edad_integrantes_familia' => $validated['edad_integrantes_familia'],
            'condiciones_salud' => $validated['condiciones_salud'],
            'analisis_academico' => $validated['analisis_academico'],
            'expectativas_educativas_ocupacionales' => $validated['expectativas_educativas_ocupacionales'],
        ]);

        return response()->json([
            'message' => 'Encuesta y alumno guardados exitosamente',
            'alumno' => $alumno,
            'encuesta' => $encuesta
        ], 201);
    }

    public function index()
    {
        // Obtener todas las encuestas y cargar las relaciones con alumno, grupo y carrera
        $encuestas = Encuesta::with(['alumno.grupo', 'alumno.carrera'])->get();

        // Agrupar las encuestas por grupo
        $encuestasPorGrupo = $encuestas->groupBy(function ($encuesta) {
            return $encuesta->alumno && $encuesta->alumno->grupo ? $encuesta->alumno->grupo->nombre : 'Sin Grupo';
        });

        // Pasar la variable $encuestasPorGrupo a la vista
        return view('dashboard_encuestas', compact('encuestasPorGrupo'));
    }
}