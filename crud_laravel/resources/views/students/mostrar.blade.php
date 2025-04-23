@extends('layouts.app')
@section('content')
<h1>Lista de Estudiantes</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Direccion</th>
      <th scope="col">Semestre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    
      @foreach ($students as $student)
      <tr>
        <td>{{ $student->name }}</td>
        <td>{{ $student->last_name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->address }}</td>
        <td>{{ $student->semester }}</td>
        <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $student->id }}">Actualizar</button>
            @include('students.actualizar', ['student' => $student])
        </td>
        </tr>
        @endforeach
    
  </tbody>
</table>
<div class="d-flex justify-content-center mt-4">
    {{ $students->links() }}
</div>
@if (session('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('success') }}
    </div>
@endif
@endsection