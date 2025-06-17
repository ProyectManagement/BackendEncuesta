<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\ChatbotController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Mostrar el formulario de encuesta
Route::get('/encuesta', [EncuestaController::class, 'showForm'])->name('encuesta.showForm');

// Guardar la encuesta
Route::post('/encuesta', [EncuestaController::class, 'store'])->name('encuesta.store');

// Mostrar el dashboard de encuestas
Route::get('/dashboard', [EncuestaController::class, 'index'])->name('encuesta.index');

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot');
Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');