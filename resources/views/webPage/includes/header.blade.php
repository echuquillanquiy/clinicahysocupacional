<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default bootsnav navbar-sticky">

        <div class="container-fluid">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('webPage/assets/img/logo.png') }}" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                    <li>
                        <a class="smooth-menu" href="/">INICIO</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#about">NOSOTROS</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#services">SERVICIOS</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#places">NUESTRAS SEDES</a>
                    </li>
                    <li>
                        <a class="smooth-menu">TRABAJA CON NOSOTROS</a>
                    </li>

                    <li>
                        <a class="smooth-menu" href="{{ route('cotizaciones') }}">COTIZACIONES</a>
                    </li>

                    @auth()
                        <li>
                            <a class="smoot-menu" href="{{ route('dashboard') }}">
                                <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="smooth-menu" href="{{ route('login') }}">
                                <i class="fa fa-user-circle fa-lg"></i>
                                Ingresar
                            </a>
                        </li>

                        <li>
                            <a class="smooth-menu" href="{{ route('register') }}">
                                <i class="fa fa-plus-circle fa-lg"></i>
                                Registrarse
                            </a>
                        </li>
                    @endauth
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
