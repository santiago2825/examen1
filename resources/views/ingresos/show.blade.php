@extends('layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-success">
                    <div class="card-header bg-success text-white text-center">
                        <h2 class="mb-0">Información del ingreso</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">codigo</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $ingreso['codigo_ingreso']}}"
                                readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">habitacion</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $ingreso['habitacion'] }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">fecha</label>
                            <input
                                type="date"
                                class="form-control"
                                value="{{ $ingreso['fecha'] }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">paciente</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $ingreso['paciente']['nombre'] ?? 'No asignado' }}"
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">medico</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $ingreso['medico']['nombre'] ?? 'No asignado' }}"
                                readonly>
                        </div>

                        <div class="d-flex justify-content-center gap-2 mt-4">
                            <a href="{{ route('ingresos.index') }}" class="btn btn-outline-success">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection