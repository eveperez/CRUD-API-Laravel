<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/estudiantes', function(){
    return 'Lista de estudiantes';
});

Route::get('/estudiantes/{id}', function(){
    return 'Estudiante: ';
});

Route::post('/estudiantes', function(){
    return 'Creando estudiantes';
});

Route::put('/estudiantes/{id}', function(){
    return 'Actualizar estudiantes';
});

Route::delete('/estudiantes/{id}', function(){
    return 'Eliminar estudiantes';
});
