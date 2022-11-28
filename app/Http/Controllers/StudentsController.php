<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{

    public function insert(Request $request) {

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'curso' => 'required',
            'dni' => 'required',
        ]);

        
        $student = new Students();
        $student->nombre = $request->nombre;
        $student->apellidos = $request->apellidos;
        $student->curso = $request->curso;
        $student->dni = $request->dni;
        $student->save();
        
        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de estudiante exitoso!",
        ]);

    }


    public function delete(Request $request){
        $students = new Students();
        $students->id = $request->id;
        if ($students = Students::find($students)){

            Request::delete();
        }
    }

}
