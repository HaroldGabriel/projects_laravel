<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentControl extends Controller
{
    public function crear()
    {
        return view('students.crear');
    }

    public function mostrar()
    {
        $students = Student::paginate(10);
        return view('students.mostrar', compact('students'));
    }
    public function guardar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:9',
            'address' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:6',
        ], [
            'email.unique' => 'El correo ya está registrado.',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->semester = $request->semester;

        $student->save();

        return redirect()->back()->with('success', 'Estudiante creado con éxito');
    }

    public function actualizar(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:9',
            'address' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:6',
        ]);

        $student->update($request->all());

        return redirect()->back()->with('success', 'Datos de Estudiante actualizado con éxito');
    }
    public function eliminar(Student $student)
    {
        $student = Student::all();
        return view('students.eliminar', compact('student'));
    }

    public function destruir(Request $request)
    {
        $Id = $request->input('Id');
        $student = Student::find($Id);
        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Estudiante eliminado con éxito');
        } else {
            return redirect()->back()->with('error', 'Id de Estudiante no encontrado');
        }
    }
}
