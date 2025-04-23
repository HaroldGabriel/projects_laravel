

<!-- Modal -->
<div class="modal fade" id="modal{{ $student->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $student->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('students.actualizar', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group ">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="name" value="{{ $student->name }}" required>
            </div>
            <div class="form-group ">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="last_name" value="{{ $student->last_name }}" required>
            </div>
            <div class="form-group ">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
            </div>
            <div class="form-group ">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="phone" value="{{ $student->phone }}" required>
            </div>
            <div class="form-group ">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="direccion" name="address" value="{{ $student->address }}" required>
            </div>
            <div class="form-group ">
                <label for="semestre" class="form-label">Semestre</label>
                <input type="text" class="form-control" id="semester" name="semester" value="{{ $student->semester }}" required>
            </div>
            <button type="submit" class="form-control">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>