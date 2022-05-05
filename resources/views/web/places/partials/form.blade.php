<div class="row mb-2">
    <div class="col-12 col-md-3">
        {!! Form::label('name', 'Nombre de la Sede') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @error('name')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 col-md-5">
        {!! Form::label('address', 'Dirección de la Sede') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
        @error('address')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 col-md-4">
        {!! Form::label('email', 'Correo electronico') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        @error('email')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row mb-4">

    <div class="col-12 col-md-2">
        {!! Form::label('phone', 'Telefono - Fijo') !!}
        {!! Form::number('phone', null, ['class' => 'form-control']) !!}
        @error('phone')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 col-md-3">
        {!! Form::label('url', 'Url de google maps') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
        @error('url')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-12 col-md-7">
        {!! Form::label('iframe', 'Iframe google maps') !!}
        {!! Form::text('iframe', null, ['class' => 'form-control']) !!}
        @error('iframe')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-12 mb-2">
        <div class="border rounded p-2">
            <h4 class="mb-1">Seleccione una foto para la Sede</h4>
            <div class="media flex-column flex-md-row">
                @isset($place->image)
                    <img id="picture" src="{{ Storage::url($place->image) }}" class="rounded mr-2 mb-md-0" width="400" height="200" alt="Blog Featured Image">
                @else
                    <img id="picture" src="https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="rounded mr-2 mb-md-0" width="400" height="200" alt="Blog Featured Image">
                @endisset
                <div class="media-body">
                    <small class="text-muted">La resolución de la imgen debe ser de 1300 x 700, de 2 mb máximo.</small>
                    <p class="my-50">
                        <a href="https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" id="blog-image-text" target="_blank">https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940</a>
                    </p>
                    <div class="d-inline-block">
                        <div class="form-group mb-0">
                            <div class="custom-file">
                                {!! Form::file('file', ['class' => 'custom-file-input form-control', 'id' => 'file', 'accept' => 'image/*']) !!}
                                {!! Form::label('file', 'Foto de la Sede', ['class' => 'custom-file-label']) !!}

                                @error('file')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
