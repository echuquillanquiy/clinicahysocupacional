<div id="places" class="doctor-tips-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>NUESTRAS <span>SEDES</span></h2>
                    <p>
                        Encuentranos en distintas Regiones
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="health-tips-items tips-carousel owl-carousel owl-theme">
                <!-- Single Item -->
                @foreach($places as $place)
                    <div class="single-item">
                        <div class="col-md-6">
                            <div class="thumb">
                                <figure>
                                    {!! $place->iframe !!}
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <div class="doctor">
                                    <h3>{{ $place->name }}</h3>
                                    <h5>{{ $place->address }}</h5>
                                </div>
                                <h4>Contacto de Sedes</h4>
                                <ul>
                                    <li>
                                        <a href="mailto:{{ $place->email }}">Correo electronico: {{ $place->email }}</a>
                                    </li>
                                    <li>
                                        <a href="tel:+51{{ $place->phone }}">Telefono: {{ $place->phone }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ $place->url }}" target="_blank">Ubiquenos en Google Maps</a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/hysoccupational" target="_blank">Facebook</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            @endforeach
            <!-- End Single Item -->

            </div>
        </div>
    </div>
</div>
