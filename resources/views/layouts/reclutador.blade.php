<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('webPage/assets/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<x-jet-banner />

<div class="min-h-screen bg-gray-100">
@livewire('navigation-menu')

<!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
@endif

<!-- Page Content -->
    <div class="container-fluid py-8 grid grid-cols-5">
        <aside>
            <h1 class="font-bold text-lg mb-4">Edición de la Convocatoria</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 @routeIs('reclutador.jobs.edit', $job) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('reclutador.jobs.edit', $job) }}">Información de Convocatoria</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 @routeIs('reclutador.job.curriculum', $job) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('reclutador.job.curriculum', $job) }}">Requisitos de Convocatoria</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 @routeIs('reclutador.job.benefit', $job) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('reclutador.job.benefit', $job) }}">Beneficios de Convocatoria</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 @routeIs('reclutador.job.applicants', $job) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('reclutador.job.applicants', $job) }}">Postulantes</a>
                </li>
            </ul>
        </aside>

        <div class="col-span-4 card">
            <main class="card-body text-gray-600">
                {{ $slot }}
            </main>
        </div>
    </div>
</div>

@stack('modals')

@livewireScripts

    @isset($js)
        {{ $js }}
    @endisset

@livewireScripts
</body>
</html>
