@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Detalle del paciente</h2>
                <a href="{{ route('pacientes.index') }}" class="btn btn-outline-secondary">Volver</a>
            </div>

            @if($paciente)
                <div class="card shadow-sm">
                    @if(!empty($paciente['imagen_url']))
                        <img src="{{ $paciente['imagen_url'] }}" alt="Foto de {{ $paciente['nombre'] }}"
                            class="card-img-top" style="max-height: 280px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-4">codigo</dt>
                            <dd class="col-sm-8">{{ $paciente['codigo_paciente'] ?? 'No disponible' }}</dd>

                            <dt class="col-sm-4">Nombre</dt>
                            <dd class="col-sm-8">{{ $paciente['nombre'] ?? 'No disponible' }}</dd>

                            <dt class="col-sm-4">Apellido</dt>
                            <dd class="col-sm-8">{{ $paciente['apellido'] ?? 'No disponible' }}</dd>
                        </dl>
                    </div>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    No se encontró el estudiante solicitado.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection