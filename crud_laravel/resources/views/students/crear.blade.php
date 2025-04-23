@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="margin-top: 50px;">
<div class="card" style="width: 30rem;">
  <div class="card-body">
    <form action="{{ route('students.guardar') }}" method="POST">
        @csrf
        <div class="form-group ">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="name" required>
        </div>
        <div class="form-group ">
            <label for="apellido" class="form-label" >Apellido</label>
            <input type="text" class="form-control" id="apellido" name="last_name" required>
        </div>
        <div class="form-group ">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group ">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="phone" required>
        </div>
        <div class="form-group ">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="address" required>
        </div>
        <div class="form-group ">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="text" class="form-control" id="semester" name="semester" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3 w-100"  >Guardar</button>
        
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mt-3" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
  </div>
</div>
</div>

@endsection