<footer class="bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="f-items default-padding">

                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item">
                        <h4>NOSOTROS</h4>
                        <p>
                            Nuestros horarios de atención a empresas
                        </p>
                        <div class="opening-info">
                            <h5>HORARIOS DE ATENCIÓN</h5>
                            <ul>
                                <li> <span> LUNES - VIERNES:  </span>
                                    <div class="pull-right"> 7.30 am - 17.00 pm </div>
                                </li>
                                <li> <span> SABADOS:</span>
                                    <div class="pull-right"> 7.30 am - 13.00 pm </div>
                                </li>
                                <li> <span> DOMINGO: </span>
                                    <div class="pull-right closed"> CERRADO </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item link">
                        <h4>NUESTROS SERVICIOS</h4>
                        <ul>
                            @foreach($services as $service)
                                <li>
                                    {!! $service->icon !!} {{ $service->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item twitter-widget">
                        <h4>ULTIMOS TRABAJOS</h4>
                        @foreach($jobs as $job)
                            <div class="twitter-item">
                                <div class="twitter-content">
                                    <p>
                                        <a href="#">{{ $job->title }} </a>
                                    </p>
                                </div>
                                <div class="twitter-context">
                                    <i class="fas fa-calendar"></i><span class="twitter-date"> {{ $job->start }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="col-md-3 col-sm-6 equal-height item">
                    <div class="f-item contact">
                        <h4>CONTACTO</h4>
                        <ul>
                            <li>
                                <a href="tel:+51991528444">
                                    <i class="fas fa-phone"></i>
                                    <p>Celular <span>991528444</span></p>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:cotizaciones@hysoccupational.com">
                                    <i class="fas fa-envelope"></i>
                                    <p>Correo electronico <span>cotizaciones@hysoccupational.com</span></p>
                                </a>
                            </li>
                            <li>
                                <a href="https://goo.gl/maps/hd6RmWqCR7UzHjMPA" target="_blank">
                                    <i class="fas fa-map"></i>
                                    <p>Oficina <span>Av. Javier Prado Este N° 1750 - San Isidro Urb. Ccorpac</span></p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </div>
    <!-- Start Footer Bottom -->
    <div class="footer-bottom bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; Copyright {{ \Carbon\Carbon::now()->format('Y')}}. Derechos reservados por <a href="mailto:echuquillanquiy@gmail.com">H&S</a></p>
                </div>
                <div class="col-md-6 text-right link">
                    <ul>
                        <li>
                            <a href="#">Terminos de usuario</a>
                        </li>
                        <li>
                            <a href="#">Soporte</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
