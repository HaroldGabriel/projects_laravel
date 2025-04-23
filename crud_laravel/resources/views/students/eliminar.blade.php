@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="margin-top: 50px;">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title text-center" >Eliminar Id del Estudiante</h5>
    </div>
      <form action="{{ route('students.destruir') }}" method="POST">
          @csrf
          <div class="form-group" style="max-width: 90%; margin: 0 auto;">
              <label for="Id" class="form-label" >ID del estudiante</label>
              <input type="text" class="form-control" id="Id" name="Id" required>
          </div>
          <div style="max-width: 90%; margin: 0 auto; margin-bottom: 20px;">
          <button type="submit" class="btn btn-danger mt-3 w-100"  >Eliminar</button>
          </div>   
      </form>
      @if (session('success'))
          <div class="alert alert-success mt-3" role="alert">
              {{ session('success') }}
          </div>
      @endif
      @if (session('error'))
          <div class="alert alert-danger mt-3" role="alert">
              {{ session('error') }}
          </div>
      @endif
    </div>
  </div>
</div>

@endsection