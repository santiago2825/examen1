<nav class="navbar navbar-expand-lg bg-success">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="/">
            clinica
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAdmin"
            aria-controls="navbarNavAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAdmin">
            <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Administración
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('paciente.*') ? 'active bg-success text-white' : '' }}"
                                    href="{{ route('pacientes.index') }}">pacientes</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('medico.*') ? 'active bg-success text-white' : '' }}"
                                    href="{{ route('medicos.index') }}">medicos</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('ingreso.*') ? 'active bg-success text-white' : '' }}"
                                    href="{{ route('ingresos.index') }}">ingresos</a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
</nav>
