<div class="mb-4">
    {!! Form::label('title', 'Título de la convocatoria') !!}
    {!! Form::text('title', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    @error('title')
        <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug de la convocatoria') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    @error('slug')
        <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo de la convocatoria') !!}
    {!! Form::text('subtitle', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción de la convocatoria') !!}
    {!! Form::textarea('description', null, ['class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    @error('description')
        <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
    @enderror
</div>

<div class="grid grid-cols-4 gap-4">

    <div>
        {!! Form::label('schedule_id', 'HORARIO') !!}
        {!! Form::select('schedule_id', $schedules, null, ['placeholder' => 'Seleccione', 'class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}

        @error('schedule_id')
            <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
        @enderror
    </div>

    <div>
        {!! Form::label('area_id', 'AREAS') !!}
        {!! Form::select('area_id', $areas, null, ['placeholder' => 'Seleccione', 'class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}

        @error('area_id')
            <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
        @enderror
    </div>

    <div>
        {!! Form::label('place_id', 'SEDES') !!}
        {!! Form::select('place_id', $places, null, ['placeholder' => 'Seleccione', 'class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}

        @error('place_id')
            <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
        @enderror
    </div>

    <div>
        @isset($job->ending)
            {!! Form::label('ending', 'Fecha de término') !!}
            {!! Form::date('ending', null,  ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}

        @else
            {!! Form::label('ending', 'Fecha de término') !!}
            {!! Form::date('ending', \Carbon\Carbon::now()->addDays(15),  ['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) !!}
        @endisset

        @error('ending')
            <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
        @enderror
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">IMAGEN DE LA CONVOCATORIA</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($job->image)
            <img id="picture" src="{{ Storage::url($job->image->url) }}" class="w-full h-64 object-cover object-center">
        @else
            <img id="picture" src="https://images.pexels.com/photos/392018/pexels-photo-392018.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="w-full h-64 object-cover object-center">
        @endisset
    </figure>

    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi blanditiis cupiditate eius eveniet expedita impedit laboriosam modi molestias nobis, optio perferendis quaerat quidem quis rem sequi voluptates! Alias, ipsa!</p>

        <div class="flex justify-center px-2 pt-1 pb-1 border-2 rounded-md @error ('file') border-red-600 @enderror">
            {!! Form::file('file', ['class' => 'mt-1 block w-full py-2 px-2 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 sm:text-sm', 'id' => 'file']) !!}
        </div>

        @error('file')
            <strong class="text-xs text-red-600 bg-red-100 rounded-md">{{ $message }}</strong>
        @enderror
    </div>
</div>
