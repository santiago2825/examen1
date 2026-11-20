@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h2 class="h4">Crear paciente</h2>
            <div class="card mt-3 shadow-sm">
                <div class="card-body p-4">

                    <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nombre" class="form-label">codigo</label>
                            <input type="text" name="codigo_paciente" id="codigo_paciente" class="form-control"
                                value="{{ old('codigo_paciente') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"
                                value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control"
                                value="{{ old('apellido') }}" required>
                        </div>


                        <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    imagen
                                </label>
                                <input
                                    type="file"
                                    name="imagen"
                                    class="form-control"
                                    accept="image/*"
                                    placeholder="Ingrese la imagen"
                                    required>
                            </div>

                        <button
                                type="submit"
                                class="btn btn-success rounded-pill px-4">
                                <i class="fas fa-save me-1"></i>
                                Guardar
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection