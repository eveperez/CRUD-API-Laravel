<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Validator;

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


    public function crearEstudiante(Request $request){
        $validator = Validator
        ($request->all(), [
            'nombre' => ['required','string','max:255'],
            'correo' => ['required','string','email','max:255'],
            'telefono' => ['required','string','max:255'],
            'carrera' => ['required','string','max:255']
        ]);

        if($validator->fails()) {
            $data = [
                'mensaje' => 'Hubo un error en el formulario',
                'errors' => $validator->errors(),
                'status' => 400   
            ];
            return response()->json($data, 400);
        }

        $estudiante = Estudiante::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'carrera' => $request->carrera
        ]);

        if($validator->fails()) {
            $data = [
                'mensaje' => 'Hubo un error al crear el estudiante',
                'errors' => $validator->errors(),
                'status' => 500   
            ];
            return response()->json($data, 500);
        }
        
        $data = [
            'estudiante' => $estudiante,
            'mensaje' => 'Estudiante creado correctamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function mostrar($id){
        $estudiante = Estudiante::find($id);

        if(!$estudiante) {
            $data = [
                'mensaje' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'estudiante' => $estudiante,
            'status' => 200
        ];
        return response()->json($estudiante, 200);
    }

}
