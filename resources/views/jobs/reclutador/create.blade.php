<x-app-layout>

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVA CONVOCATORIA</h1>

                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => ['reclutador.jobs.store'], 'method' => 'post', 'files' => true]) !!}

                    {!! Form::hidden('user_id', auth()->user()->id) !!}

                    @include('jobs.reclutador.partials.form')

                    <div class="flex justify-end">
                        {!! Form::submit('Crear nueva Convocatoria', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/jobs/reclutador.js') }}"></script>
    </x-slot>

</x-app-layout>
