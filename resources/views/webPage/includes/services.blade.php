<div id="services" class="department-tabs default-padding bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-4 tab-navs">
                <div class="heading">
                    <h4>NUESTROS SERVICIOS</h4>
                </div>
                <!-- Tab Nav -->
                <ul class="nav nav-pills">
                    <li class="active">
                        <a data-toggle="tab" href="#tab" aria-expanded="true">
                            RED CLINICAS H&S
                        </a>
                    </li>
                    @foreach($services as $service)
                        <li>
                            <a data-toggle="tab" href="#tab{{ $service->id }}" aria-expanded="false">
                                {{ $service->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- End Tab Nav -->
            </div>
            <div class="col-md-8 tab-contents">
                <div class="row">
                    <!-- Start Tab Content -->
                    <div class="tab-content tab-content-info">
                        <!-- Single Item -->

                        <div id="tab" class="tab-pane fade active in">

                            <!-- Start Department Info -->

                            <div class="col-md-6">
                                <div class="info title">
                                    <div class="thumb">
                                        <img src="{{ asset('webPage/assets/img/slider/home.jpg') }}" alt="Thumb">
                                    </div>
                                    <h3>SERVICIOS H&S OCUPACIONAL</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Atque commodi culpa ducimus est labore molestiae, omnis unde. Accusantium ad deleniti in ipsam voluptatibus.
                                        Adipisci aut deserunt facere quas, qui sed?
                                    </p>

                                </div>
                            </div>

                            <!-- End Department Info -->

                            <!-- Start Opening Hours -->
                            <div class="col-md-6 opening-hours">
                                <div class="opening-info">
                                    <h4>Horario de Atención</h4>
                                    <ul>
                                        <li>Lunes <div class="pull-right"> 7.30 am - 17.00 pm </div></li>
                                        <li>Martes <div class="pull-right"> 7.30 am - 17.00 pm </div></li>
                                        <li>Miercoles <div class="pull-right"> 7.30 am - 17.00 pm</div></li>
                                        <li>Jueves <div class="pull-right"> 7.30 am - 17.00 pm </div></li>
                                        <li>Viernes <div class="pull-right"> 7.30 am - 17.00 pm </div></li>
                                        <li>Sábado <div class="pull-right"> 7.30 am - 13.00 pm </div></li>
                                        <li>Domingo <div class="pull-right closed"> Cerrado </div></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Opening Hours -->

                        </div>

                        <!-- End Single Item -->

                        <!-- Single Item -->
                        @foreach($services as $service)
                            <div id="tab{{ $service->id }}" class="tab-pane fade">
                                <!-- Start Department Info -->
                                <div class="col-md-12">
                                    <div class="info title py-5">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/services/'.$service->image) }}" alt="Thumb">
                                        </div>
                                        <h1>{{ $service->name }}</h1>
                                        <p class="text-black">
                                            {{ $service->description }}
                                        </p>

                                    </div>
                                </div>
                                <!-- End Department Info -->
                            </div>
                    @endforeach
                    <!-- End Single Item -->

                    </div>
                    <!-- End Tab Content -->
                </div>
            </div>
        </div>
    </div>
</div>
