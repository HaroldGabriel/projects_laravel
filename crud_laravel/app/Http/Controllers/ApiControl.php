<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiControl extends Controller
{
    public function index()
    {

        $student = Student::all();

        if ($student->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No hay estudiantes registrados'
            ], 404);
        }
        return response()->json($student, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:student,email',
            'phone' => 'required|string|max:9',
            'address' => 'required|string|max:255',
            'semester' => 'required|string|max:15',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $student = Student::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'semester' => $request->semester,
        ]);

        if ($student) {
            return response()->json([
                'status' => 'success',
                'message' => 'Estudiante creado correctamente',
                'data' => $student
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear el estudiante'
            ], 500);
        }
    }

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Estudiante no encontrado'
            ], 404);
        }

        return response()->json($student, 200);
    }

    public function delete($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Estudiante no encontrado'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Estudiante eliminado correctamente'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Estudiante no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'last_name' => 'string|max:100',
            'email' => 'email|unique:student,email,',
            'phone' => 'string|max:9',
            'address' => 'string|max:255',
            'semester' => 'string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $student = Student::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'semester' => $request->semester,
        ]);

        $student->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Estudiante actualizado correctamente',
            'data' => $student
        ], 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Estudiante no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'last_name' => 'string|max:100',
            'email' => 'email|unique:student,email,',
            'phone' => 'string|max:9',
            'address' => 'string|max:255',
            'semester' => 'string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        if($request->has('name')) {
            $student->name = $request->name;
        }
        if($request->has('last_name')) {
            $student->last_name = $request->last_name;
        }
        if($request->has('email')) {
            $student->email = $request->email;
        }
        if($request->has('phone')) {
            $student->phone = $request->phone;
        }
        if($request->has('address')) {
            $student->address = $request->address;
        }
        if($request->has('semester')) {
            $student->semester = $request->semester;
        }

        $student->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Estudiante actualizado correctamente',
            'data' => $student
        ], 200);
    }
}
