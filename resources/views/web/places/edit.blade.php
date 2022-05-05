@extends('theme.app')

@section('content')
    <div class="card">
        <div class="card-header">
            ACTUALIZAR SEDE
        </div>
        <div class="card-body">

            {!! Form::model($place, ['route' => ['places.update', $place], 'method' => 'put', 'files' => true]) !!}

            @include('web.places.partials.form')

            <div class="col-12 mt-50">
                {!! Form::submit('Actualizar Sede', ['class' => 'btn btn-primary mr-1 waves-effect waves-float waves-light']) !!}
                <a href="{{ route('places.index') }}" class="btn btn-outline-secondary waves-effect">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <script>
        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
