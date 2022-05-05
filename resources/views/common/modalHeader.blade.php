<div
    wire:ignore.self
    class="modal fade text-left"
    id="theModal"
    tabindex="-1"
    role="dialog"
>
    <div class="modal-dialog modal-dialog-top modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">{{ $componentName }} | {{ $selected_id > 0 ? 'EDITAR' : 'CREAR' }} </h4>
                <h5 class="text-center text-warning" wire:loading>
                    POR FAVOR ESPERE...
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


