<x-app-layout>
    <div class="py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h1 class="text-7xl text-center">Bienvenido {{ auth()->user()->name }}, {{ auth()->user()->lastname }}</h1>
                </div>

                @can('Crear trabajos')
                    <div class="card-body grid grid-cols-6">
                        <a href="" class="btn btn-primary btn-block">Reclutador</a>
                    </div>
                @endcan

            </div>
        </div>
    </div>
</x-app-layout>
