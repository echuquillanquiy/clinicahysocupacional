<x-reclutador-layout>

    <x-slot name="job">
        {{ $job->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold">INFORMACIÓN DE LA CONVOCATORIA</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($job, ['route' => ['reclutador.jobs.update', $job], 'method' => 'put', 'files' => true]) !!}

    @include('jobs.reclutador.partials.form')

    <div class="flex justify-end">
        {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary cursor-pointer']) !!}
    </div>

    {!! Form::close() !!}

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/jobs/reclutador.js') }}"></script>
    </x-slot>

</x-reclutador-layout>
