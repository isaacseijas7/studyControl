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

            @if ((Auth::user()->rol == 'admin'))
                
            

            <li class="nav-item">
                <a class="nav-link" href="{{route('academic_periods.index')}}">
                    Período académico
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    Repesentantes
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('representatives.index') }}"> 
                            Lista Repesentantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('representatives.create') }}"> 
                            Registrar Repesentante
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    Estudiantes
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}"> 
                            Lista Estudiantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.create') }}"> 
                            Registrar Estudiante
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    Personal
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teachers.index') }}"> 
                            Lista Profesores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teachers.create') }}"> 
                            Registrar Profesor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('workers.index') }}"> 
                            Lista Obreros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('workers.create') }}"> 
                            Registrar Obrero
                        </a>
                    </li>
                </ul>
            </li>

            @elseif ((Auth::user()->rol == 'teachers'))
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('materias.index')}}">
                        Lista materias
                    </a>
                </li>
                    
            @endif
           
        </ul>
    </nav>
</div>