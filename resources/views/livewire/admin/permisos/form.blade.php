@include('common.modalHeader')

<div class="col-xl-12 col-md-6 col-12 mb-1">
    <div class="form-group">
        <label for="name">Nombre del Permiso</label>
        <input type="text" class="form-control" wire:model.lazy="permissionName">

        @error('permissionName')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
</div>

@include('common.modalFooter')
