</div>
<div class="modal-footer">

    @if($selected_id < 1)
        <button type="button" class="btn btn-primary" wire:click.prevent="Store()">GUARDAR</button>
    @else
        <button type="button" class="btn btn-primary" wire:click.prevent="Update()">ACTUALIZAR</button>
    @endif
    <button type="button" class="btn btn-danger" wire:click.prevent="resetUI()" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
