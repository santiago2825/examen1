@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h2 class="h4">Editar medico</h2>
            <div class="card mt-3 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('medicos.update', $medico['id']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" name="codigo_medico" id="codigo_medico" class="form-control"
                                value="{{ old('codigo_medico', $medico['codigo_medico'] ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"
                                value="{{ old('nombre', $medico['nombre'] ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control"
                                value="{{ old('apellido', $medico['apellido'] ?? '') }}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection