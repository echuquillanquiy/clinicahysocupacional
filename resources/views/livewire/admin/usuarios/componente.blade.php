<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $componentName }} | {{ $pageTitle }}</h4>
                @include('common.searchbox')
                <div class="dt-action-buttons text-right">
                    <a class="dt-button create-new btn btn-primary" data-toggle="modal" data-target="#theModal">
                        <span>
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            Agregar Usuario
                        </span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover-animation">
                        <thead>
                        <tr>
                            <th class="text-center">FOTO</th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nombres y Apellidos</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Perfil</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">OPCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="text-center">
                                    <span class="avatar">
                                        <img class="round" src="{{ $usuario->profile_photo_url }}" alt="avatar" height="40" width="40">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-weight-bold">{{ $usuario->id }}</span>
                                </td>
                                <td>{{ $usuario->name }}, {{ $usuario->lastname }}</td>
                                <td class="text-center">{{ $usuario->username }}</td>
                                <td class="text-center">{{ $usuario->profile }}</td>
                                <td class="text-center">{{ $usuario->phone }}</td>
                                <td class="text-center">{{ $usuario->email }}</td>
                                <td class="text-center">
                                    @if($usuario->status == 'active')
                                        <span class="badge badge-success">
                                            Activo
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            Bloqueado
                                        </span>
                                    @endif

                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" wire:click="Edit({{ $usuario->id }})" class="btn btn-outline-warning" title="Editar Registro">Editar</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-danger" onclick="Confirm('{{ $usuario->id }}')">Eliminar</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-1">
                        {{ $usuarios->links() }}
                    </div>

                </div>
            </div>
        </div>
        @include('livewire.admin.usuarios.form')
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('usuario-added', Msg => {
            $('#theModal').modal('hide')
            toastr.success(Msg)
        });

        window.livewire.on('usuario-updated', Msg => {
            $('#theModal').modal('hide')
            toastr.success(Msg)
        });

        window.livewire.on('usuario-deleted', Msg => {
            toastr.info(Msg)
        });

        window.livewire.on('hide-modal', Msg => {
            $('#theModal').modal('hide')
        });
    });

    function Confirm(id)
    {
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar',
        }).then(function (result){
            if (result.value){
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
