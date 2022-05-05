<div>
    <div id="works" class="doctor-tips-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>ULTIMOS TRABAJOS<span> PUBLICADOS</span></h2>
                        <p>
                            Encuentranos en distintas Regiones
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="health-tips-items tips-carousel owl-carousel owl-theme">
                    <!-- Single Item -->
                    @foreach($jobs as $job)
                        <div class="single-item">
                            <div class="col-md-6">
                                <div class="thumb">
                                    <figure>
                                        <a href="{{ route('trabajos.index') }}">
                                            <img src="{{ Storage::url( $job->image->url ) }}" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <div class="doctor">
                                        <h3>
                                            <a href="{{ route('trabajos.index') }}">
                                                {{ $job->title }}
                                            </a>
                                        </h3>
                                        <h5>{{ $job->subtitle }}</h5>
                                        <h5>Publicación: {{ $job->start }} - Postulantes: <span class="text-danger"> ({{ $job->applicants_count }})</span></h5>
                                        <h3>{{ $job->area->name }} - {{ $job->place->name }} - {{ $job->schedule->name }}</h3>

                                        @can('applied', $job)
                                            <span class="alert alert-info">YA POSTULASTE ESTA VACANTE</span>
                                        @else
                                            <form action="{{ route('work.applied', $job) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-xs btn-success" type="submit">Postular</button>
                                            </form>
                                        @endcan

                                    </div>
                                    <h4>Requisitos</h4>
                                    <ul>
                                        @foreach($job->requirements as $requirement)
                                            <li>
                                                {{ $requirement->name }}
                                            </li>
                                        @endforeach
                                    </ul>

                                    <br>

                                    <h4>Beneficios</h4>
                                    <ul>
                                        @foreach($job->benefits as $benefit)
                                            <li>
                                                {{ $benefit->name }}
                                            </li>
                                        @endforeach
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
</div>

