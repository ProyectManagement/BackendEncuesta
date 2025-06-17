<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function ask(Request $request)
    {
        try {
            // Obtener la pregunta del usuario
            $question = strtolower($request->input('question'));
    
            // Respuestas predeterminadas
            $responses = [
                'hola' => '¡Hola! ¿En qué puedo ayudarte?',
                'adiós' => '¡Hasta luego! Espero haber sido útil.',
                'ayuda' => 'Puedes preguntarme sobre estudiantes en riesgo o cualquier otra cosa.',
                'gracias' => '¡De nada! Estoy aquí para ayudarte.'
            ];
    
            // Buscar respuesta predeterminada
            foreach ($responses as $key => $value) {
                if (strpos($question, $key) !== false) {
                    return response()->json(['response' => $value]);
                }
            }
    
            // Conectar a MongoDB usando Laravel
            $database = DB::connection('mongodb')->getMongoDB();
            $collection = $database->selectCollection('predicciones');
    
            // Buscar estudiantes en riesgo
            if (strpos($question, 'estudiantes en riesgo') !== false || strpos($question, 'quién está en riesgo') !== false) {
                $results = $collection->find(['riesgo' => 'Alto']);
    
                // Convertir resultados a array
                $results = iterator_to_array($results);
    
                if (empty($results)) {
                    return response()->json(['response' => 'No hay estudiantes en riesgo actualmente.']);
                }
    
                $response = "Los siguientes estudiantes están en riesgo:\n";
                foreach ($results as $student) {
                    // Validar que exista el campo 'id_alumno'
                    $idAlumno = $student['id_alumno'] ?? 'N/A'; // Valor predeterminado si no existe
                    $riesgo = $student['riesgo'] ?? 'Desconocido'; // Valor predeterminado si no existe
    
                    $response .= "- ID Alumno: {$idAlumno} (Riesgo: {$riesgo})\n";
                }
    
                return response()->json(['response' => $response]);
            }
    
            // Respuesta predeterminada si no se entiende la pregunta
            return response()->json(['response' => 'No entendí tu pregunta. ¿Podrías ser más específico?']);
        } catch (\Exception $e) {
            // Mostrar el mensaje de error detallado
            return response()->json(['response' => 'Ocurrió un error: ' . $e->getMessage()]);
        }
    }
}