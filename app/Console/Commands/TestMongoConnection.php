<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestMongoConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mongo:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prueba la conexión a MongoDB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // Conectar a MongoDB
            $database = DB::connection('mongodb')->getMongoDB(); // Obtener la base de datos
            $collection = $database->selectCollection('predicciones'); // Seleccionar la colección

            // Contar documentos en la colección
            $count = $collection->countDocuments();

            // Mostrar resultado
            $this->info("Conexión exitosa. Hay {$count} documentos en la colección 'predicciones'.");
        } catch (\Exception $e) {
            // Mostrar error
            $this->error("Error al conectar a MongoDB: " . $e->getMessage());
        }
    }
}