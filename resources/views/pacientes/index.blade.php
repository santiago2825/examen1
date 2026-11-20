@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">pacientes</h2>
        <a href="{{ route('pacientes.create') }}" class="btn btn-success">Nuevo pacientes</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>codigo</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pacientes as $paciente)
                            <tr>
                                <td class="text-center">
                                    @if (!empty($paciente['imagen_url']))
                                        <img src="{{ $paciente['imagen_url'] }}" width="100" alt="Foto">
                                    @endif
                                </td>
                                <td class="fw-semibold text-dark text-start">
                                    {{ $paciente['codigo_paciente'] }}
                                </td>
                                <td class="text-secondary text-start">{{ $paciente['nombre'] }}</td>
                                <td class="text-secondary text-start">{{ $paciente['apellido']}}</td>
                                <td class="text-center sticky-actions col-acciones">
                                    <div class="d-flex justify-content-center gap-2"> 
                                        <a href="{{ route('pacientes.show', $paciente['id']) }}"
                                            class="btn btn-sm btn-outline-primary rounded-circle action-btn"
                                            title="Ver detalle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pacientes.edit', $paciente['id']) }}" 
                                            class="btn btn-sm btn-outline-warning rounded-circle action-btn"
                                            title="Editar">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('pacientes.destroy', $paciente['id']) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle action-btn"
                                                onclick="return confirm('¿Estás seguro de eliminar este computador?')"
                                                title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form> 
                                    </div> 
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay pacientes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection