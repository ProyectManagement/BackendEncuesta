<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Grupo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener los grupos
        $grupos = Grupo::all();

        // Verificar si hay grupos
        if ($grupos->isEmpty()) {
            return view('dashboard.index', ['message' => 'No hay grupos disponibles.']);
        }

        // Obtener las encuestas agrupadas por grupo
        $gruposConEncuestas = $grupos->map(function ($grupo) {
            // Intentamos obtener las encuestas para este grupo
            try {
                // Depurar los resultados antes de la consulta para ver si hay un problema con el grupo
                dd('Buscando encuestas para el grupo: ' . $grupo->nombre);

                // Obtener los alumnos que están en el grupo por el campo 'dato_grupo'
                $alumnos = Encuesta::where('dato_grupo', $grupo->nombre)->get();

                // Depurar el resultado de la consulta para ver si se encuentran los alumnos
                dd('Alumnos encontrados: ', $alumnos);

                // Verificar si se encontraron alumnos
                if ($alumnos->isEmpty()) {
                    return ['grupo' => $grupo->nombre, 'message' => 'No hay alumnos para este grupo.'];
                }

                // Asignar los campos directamente a cada alumno
                $grupo->alumnos = $alumnos->map(function ($alumno) {
                    return [
                        'matricula' => $alumno->dato_matricula,
                        'nombre' => $alumno->dato_nombre,
                        'apellido_paterno' => $alumno->dato_apellido_paterno,
                        'apellido_materno' => $alumno->dato_apellido_materno,
                        'carrera' => $alumno->dato_carrera,
                        'grupo' => $alumno->dato_grupo,
                    ];
                });

                return $grupo;
            } catch (\Exception $e) {
                // Si ocurre un error, mostrar un mensaje y la excepción
                dd('Error en la consulta: ' . $e->getMessage());
            }
        });

        // Pasar los datos a la vista
        return view('dashboard.index', compact('gruposConEncuestas'));
    }
}
