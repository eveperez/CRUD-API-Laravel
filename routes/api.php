<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EstudianteController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/estudiantes', [EstudianteController::class, 'index']);

Route::get('/estudiantes/{id}',[EstudianteController::class, 'mostrar']);

Route::post('/estudiantes', [EstudianteController::class, 'crearEstudiante']);

Route::put('/estudiantes/{id}', function(){
    return 'Actualizar estudiantes';
});

Route::delete('/estudiantes/{id}', function(){
    return 'Eliminar estudiantes';
});


