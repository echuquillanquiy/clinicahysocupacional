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
                            Agregar Horario
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
                            <th class="text-center">OPCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>
                                    <span class="font-weight-bold">{{ $schedule->id }}</span>
                                </td>
                                <td>{{ $schedule->name }}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" wire:click="Edit({{ $schedule->id }})" class="btn btn-outline-warning" title="Editar Registro">Editar</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-danger" onclick="Confirm('{{ $schedule->id }}')">Eliminar</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-1">
                        {{ $schedules->links() }}
                    </div>

                </div>
            </div>
        </div>
        @include('livewire.web.schedules.form')
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show')
        });

        window.livewire.on('schedule-added', Msg => {
            $('#theModal').modal('hide')
            toastr.success(Msg)
        });

        window.livewire.on('schedule-updated', Msg => {
            $('#theModal').modal('hide')
            toastr.success(Msg)
        });

        window.livewire.on('schedule-deleted', Msg => {
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
