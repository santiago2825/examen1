@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Detalle del medico</h2>
                <a href="{{ route('medicos.index') }}" class="btn btn-outline-secondary">Volver</a>
            </div>

            @if($medico)
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        {{ $medico['nombre'] ?? 'medico' }}
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-4">Código</dt>
                            <dd class="col-sm-8">{{ $medico['codigo_medico'] ?? 'No disponible' }}</dd>

                            <dt class="col-sm-4">Nombre</dt>
                            <dd class="col-sm-8">{{ $medico['nombre'] ?? 'No disponible' }}</dd>

                            <dt class="col-sm-4">apellido</dt>
                            <dd class="col-sm-8">{{ $medico['apellido'] ?? 'No disponible' }}</dd>
                        </dl>
                    </div>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    No se encontró el medico solicitado.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection