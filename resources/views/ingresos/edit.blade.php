@extends('layout.app')
@section('content')
    <div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-success text-white text-center fw-bold fs-4">
                    Actualizar Computador
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('ingresos.update', $ingreso['id']) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                codigo
                            </label>

                            <input
                                type="text"
                                name="codigo_ingreso"
                                class="form-control"
                                value="{{ old('codigo_ingreso', $ingreso['codigo_ingreso'] ?? '') }}"
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
                                value="{{ old('habitacion', $ingreso['habitacion'] ?? '') }}"
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
                                value="{{ old('fecha', $ingreso['fecha'] ?? '') }}"
                                placeholder="Ingrese la fecha"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                paciente
                            </label>
                            <select name="paciente_id" class="form-control" required>
                                <option value="">Seleccione un paciente</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente['id'] }}" {{ old('paciente_id', $ingreso['paciente_id']) == $paciente['id'] ? 'selected' : '' }}>
                                        {{ $paciente['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                medico
                            </label>
                            <select name="medico_id" class="form-control" required>
                                <option value="">Seleccione un medico</option>
                                @foreach ($medicos as $medico)
                                    <option value="{{ $medico['id'] }}" {{ old('medico_id', $ingreso['medico_id']) == $medico['id'] ? 'selected' : '' }}>
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
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection