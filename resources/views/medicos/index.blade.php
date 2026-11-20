@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Módulos</h2>
        <a href="{{ route('medicos.create') }}" class="btn btn-success">Nuevo módulo</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>apellido</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medicos as $medico)
                            <tr>
                                <td>{{ $medico['codigo_medico'] ?? 'No disponible' }}</td>
                                <td>{{ $medico['nombre'] ?? 'No disponible' }}</td>
                                <td>{{ $medico['apellido'] ?? 'No disponible' }}</td>
                                <td class="text-end text-nowrap">
                                    <a href="{{ route('medicos.show', $medico['id']) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('medicos.edit', $medico['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('medicos.destroy', $medico['id']) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No hay módulos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection