<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $pageTitle }} | {{ $componentName }}</h4>
                @include('common.searchbox')
                <div class="dt-action-buttons text-right">
                    <a class="dt-button create-new btn btn-primary" href="{{ route('places.create') }}">
                        <span>
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            Agregar Sede
                        </span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover-animation">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>DESCRIPCION</th>
                            <th>DIRECCIÓN</th>
                            <th>CORREO ELECTRONICO</th>
                            <th>TELEFONO</th>
                            <th class="text-center">OPCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($places as $place)
                            <tr>
                                <td>
                                    <span class="font-weight-bold">{{ $place->id }}</span>
                                </td>
                                <td>{{ $place->name }}</td>
                                <td>{{ $place->address }}</td>
                                <td>{{ $place->email }}</td>
                                <td>{{ $place->phone }}</td>
                                <td class="text-center">
                                    <a href="{{ route('places.edit', $place) }}" class="btn btn-outline-warning mb-1" title="Editar Registro">Editar</a>
                                    <form action="{{ route('places.destroy', $place) }}" method="POST">
                                        @method('delete')
                                        @csrf

                                        <button onclick="return confirm('¿ESTAS SEGURO DE ELIMINAR LA SEDE: {{ $place->name }}?');" type="submit" class="btn btn-danger hover:text-black">Eliminar</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-1">
                        {{ $places->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


