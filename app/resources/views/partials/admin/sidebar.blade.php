<div class="sidebar">

    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                Panel
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}"><i class="icon-speedometer"></i> Panel</a>
            </li>

            <li class="divider"></li>
            <li class="nav-title">
                Modulos
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('academic_periods.index')}}"><i class="icon-speedometer"></i> Período académico</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    Estudiantes
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}"><i class="icon-puzzle"></i> Listar Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.createRegular') }}"><i class="icon-puzzle"></i> Inscripción Regular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.create') }}"><i class="icon-puzzle"></i> Inscripción Nuevo</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    Reportes
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-elink" href="#"><i class="icon-puzzle"></i> Constancia de studio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-puzzle"></i> Planilla Inscripción</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-puzzle"></i> Boleta de Notas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-puzzle"></i> Listado de Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-puzzle"></i> estudiantes Activos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-puzzle"></i> estudiantes Pasivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-puzzle"></i> Docentes</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>