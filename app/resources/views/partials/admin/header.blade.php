<header class="app-header navbar">

    <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav hidden-md-down">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>

        <li class="nav-item px-1">
            <a class="nav-link" href="{{ route('home') }}">panel</a>
        </li>
        <!-- <li class="nav-item px-1">
            <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item px-1">
            <a class="nav-link" href="#">Settings</a>
        </li> -->
    </ul>

    
    <ul class="nav navbar-nav ml-auto">

        @guest

            <li class="nav-item hidden-md-down">
                <a class="nav-link" href="{{ route('login') }}">
                    Login
                </a>
            </li>
        @else

            <li class="nav-item dropdown hidden-md-down">
                <a class="nav-link dropdown-toggle nav-link" style="padding-right: 15px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/img/avatars/5.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="hidden-md-down">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> 
                        Cerar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </li>
        @endguest

    </ul>
    
</header>
