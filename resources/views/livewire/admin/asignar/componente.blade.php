<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $componentName }}</h4>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-4 mb-1">
                        <select wire:model="role" class="form-control">
                            <option value="Elegir">Seleccione un Rol</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-lg-6 col-md-6 mr-4">

                        <button wire:click.prevent="SyncAll()" class="btn btn-outline-primary" type="button">
                            Sincronizar Todos
                        </button>

                        <button onclick="Revocar()" class="btn btn-outline-primary" type="button">
                            Revocar Todos
                        </button>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover-animation">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>PERMISO</th>
                            <th class="text-center">ROLES CON EL PERMISO</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permisos as $permiso)
                            <tr>
                                <td class="text-center">
                                    <span class="font-weight-bold">{{ $permiso->id }}</span>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               wire:change="syncPermiso($('#p' + {{ $permiso->id }}).is(':checked'), '{{ $permiso->name }}' )"
                                               id="p{{ $permiso->id }}"
                                               value="{{ $permiso->id }}"
                                               class="custom-control-input"
                                            {{ $permiso->checked == 1 ? 'checked' : '' }}
                                        />
                                        <label class="custom-control-label" for="p{{ $permiso->id }}">{{ $permiso->name }}</label>
                                    </div>
                                </td>

                                <td>
                                    <h6 class="text-center">{{ App\Models\User::permission($permiso->name)->count() }}</h6>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-1">
                        {{ $permisos->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        window.livewire.on('sync-error', Msg => {
            toastr.warning(Msg)
            toastr.options.closeDuration = 150
            toastr.options.progressBar = true
        });

        window.livewire.on('permi', Msg => {
            toastr.info(Msg)
            toastr.options.closeDuration = 150
            toastr.options.progressBar = true
        });

        window.livewire.on('syncall', Msg => {
            toastr.success(Msg)
            toastr.options.closeDuration = 150
            toastr.options.progressBar = true
        });

        window.livewire.on('removeall', Msg => {
            toastr.error(Msg)
            toastr.options.closeDuration = 150
            toastr.options.progressBar = true
        });

    });

    function Revocar(id)
    {
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS REVOCAR TODOS LOS PERMISOS?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar',
        }).then(function (result){
            if (result.value){
                window.livewire.emit('revokeall', id)
                swal.close()
            }
        })
    }
</script>
