<nav class="header-navbar navbar navbar-expand-lg align-items-center navbar-light navbar-shadow fixed-top">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ auth()->user()->username }}</span><span class="user-status">{{ auth()->user()->profile }}</span></div>
                    <span class="avatar">
                        <img class="round" src="{{ auth()->user()->profile_photo_url }}" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online">

                        </span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('profile.show') }}" target="_blank">
                        <i class="mr-50" data-feather="user"></i>
                        Perfil
                    </a>
                    @can('Ver dashboard')
                        <a class="dropdown-item" href="{{ route('admin.user.index') }}" target="_blank">
                            <i class="mr-50" data-feather="unlock"></i>
                            Administrador
                        </a>
                    @endcan

                    <a class="dropdown-item" href="{{ route('reclutador.job-index') }}" target="_blank">
                        <i class="mr-50" data-feather="unlock"></i>
                        Reclutador
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="mr-50" data-feather="power"></i>
                        Salir
                    </a>


                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>

                </div>
            </li>
        </ul>
    </div>
</nav>

