@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h2 class="h4">Editar paciente</h2>
            <div class="card mt-3 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('pacientes.update', $paciente['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">codigo</label>
                            <input type="text" name="codigo_paciente" id="codigo_paciente" class="form-control"
                                value="{{ old('codigo_paciente', $paciente['codigo_paciente'] ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"
                                value="{{ old('nombre', $paciente['nombre'] ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control"
                                value="{{ old('apellido', $paciente['apellido'] ?? '') }}" required>
                        </div>


                        <div class="mb-3">
                            <label for="imagen" class="form-label">Cambiar foto (opcional)</label>
                            @if(!empty($paciente['imagen_url']))
                                <div class="mb-2">
                                    <img src="{{ $paciente['imagen_url'] }}" alt="Foto actual de {{ $paciente['nombre'] }}"
                                        class="rounded" width="96" height="96" style="object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" name="imagen" id="imagen" class="form-control"
                                accept="image/jpeg,image/png,image/webp">
                        </div>


                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection