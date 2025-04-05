<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;


class EstudianteController extends Controller
{
    public function index()
    {
        $estudiante = Estudiante::all();

        if($estudiante->isEmpty()) {
            $data = [
                'mensaje' => 'No hay estudiantes registrados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($estudiante, 200);
    }
}
