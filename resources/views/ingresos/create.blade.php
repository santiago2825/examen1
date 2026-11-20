@extends('layout.app')
@section('content')
    <div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-success text-white text-center fw-bold fs-4">
                    Nuevo Computador
                </div>

                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('ingresos.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                codigo
                            </label>

                            <input
                                type="text"
                                name="codigo_ingreso"
                                class="form-control"
                                value="{{ old('codigo_ingreso') }}"
                                placeholder="Ingrese el codigo"
                                required>
                        </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    habitacion
                                </label>
                                <input
                                    type="text"
                                    name="habitacion"
                                    class="form-control"
                                    value="{{ old('habitacion') }}"
                                    placeholder="Ingrese la habitacion"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    fecha
                                </label>
                                <input
                                    type="date"
                                    name="fecha"
                                    class="form-control"
                                    value="{{ old('fecha') }}"
                                    placeholder="Ingrese la fecha"
                                    required>
                            </div>



                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    pacientes
                                </label>
                                <select name="paciente_id" class="form-control" required>
                                    <option value="">Seleccione un paciente</option>
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{ $paciente['id'] }}" {{ old('paciente_id') == $paciente['id'] ? 'selected' : '' }}>
                                            {{ $paciente['nombre'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    medicos
                                </label>
                                <select name="medico_id" class="form-control" required>
                                    <option value="">Seleccione un medico</option>
                                    @foreach ($medicos as $medico)
                                        <option value="{{ $medico['id'] }}" {{ old('medico_id') == $medico['id'] ? 'selected' : '' }}>
                                            {{ $medico['nombre'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('ingresos.index') }}"
                                class="btn btn-secondary rounded-pill px-4">
                                Cancelar
                            </a>
                            <button
                                type="submit"
                                class="btn btn-success rounded-pill px-4">
                                <i class="fas fa-save me-1"></i>
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection