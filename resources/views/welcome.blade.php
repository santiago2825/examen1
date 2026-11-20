@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">Panel de Gestión</h1>
        <p class="text-muted">Selecciona el módulo al que deseas ingresar</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Tarjeta Profesor -->
        <div class="col">
            <div class="card h-100 bg-white border-success shadow-sm text-center">
                <div class="card-header bg-success text-white fw-semibold py-3">
                    Módulo medico
                </div>
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 mb-3">
                            medicos
                        </span>
                        <h4 class="card-title text-success fw-bold">medicos</h4>
                        <p class="card-text text-muted">
                            Administra el registro de los medicos.
                        </p>
                    </div>
                    <a  class="btn btn-success w-100 mt-4">
                        Ir a medicos
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Estudiante -->
        <div class="col">
            <div class="card h-100 bg-white border-success shadow-sm text-center">
                <div class="card-header bg-success text-white fw-semibold py-3">
                    Módulo pacientes
                </div>
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 mb-3">
                            pacientes
                        </span>
                        <h4 class="card-title text-success fw-bold">pacientes</h4>
                        <p class="card-text text-muted">
                            Consulta y gestiona los pacientes registrados en el sistema.
                        </p>
                    </div>
                    {{-- <a href="{{ route('pacientes.index') }}" class="btn btn-success w-100 mt-4"> --}}
                        Ir a pacientes
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Módulo -->
        <div class="col">
            <div class="card h-100 bg-white border-success shadow-sm text-center">
                <div class="card-header bg-success text-white fw-semibold py-3">
                    Módulo ingresos
                </div>
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 mb-3">
                            ingreso
                        </span>
                        <h4 class="card-title text-success fw-bold">ingreso</h4>
                        <p class="card-text text-muted">
                            Gestiona los ingresos de la clinica
                        </p>
                    </div>
                    {{-- <a href="{{ route('ingresos.index') }}" class="btn btn-success w-100 mt-4"> --}}
                        Ir a ingresos
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
