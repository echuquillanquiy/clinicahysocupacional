<div id="works" class="blog-area default-padding bg-info">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>ULTIMOS <span>TRABAJOS PUBLICADOS</span></h2>
                    <h4>
                        Unete a nuestro equipo de trabajo.
                    </h4>
                    <a href="{{ route('trabajos.index') }}" class="btn btn-theme circle border btn-md">VER MAS TRABAJOS</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="blog-items">
                <!-- Single Item -->
                @foreach($jobs as $job)
                    <div class="col-md-3 single-item" style="margin-bottom: 1rem !important;">
                        <div class="item">
                            <div class="thumb">
                                <a href="{{ route('trabajos.index') }}">
                                    <img src="{{ Storage::url( $job->image->url ) }}" alt="Thumb">
                                    <div class="post-type">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li><a href="{{ route('trabajos.index') }}">{{ $job->area->name }}</a></li>
                                        <li>{{ $job->start }} - {{ $job->place->name }} - {{ $job->schedule->name }}</li>
                                        <li><span class="text-primary"><i class="fas fa-users"></i>  Postulantes: </span> {{ $job->applicants_count }}</li>
                                    </ul>
                                </div>
                                <h4>
                                    <a href="#">{{ $job->title }}</a>
                                </h4>
                                <p>
                                    {!! Str::limit($job->description, 40) !!}
                                </p>
                            </div>
                        </div>
                    </div>
            @endforeach
            <!-- End Single Item -->
            </div>
        </div>
    </div>

</div>
