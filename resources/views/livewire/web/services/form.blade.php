@include('common.modalHeader')

<div class="row">
    <div class="col-xl-12 col-md-12 col-12 mb-1">
        <div class="form-group">
            <label for="name">Nombres</label>
            <input type="text" class="form-control" wire:model.lazy="name">

            @error('name')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-12 col-md-12 col-12 mb-1">
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" wire:model.lazy="description"></textarea>

            @error('description')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-12 col-md-12 col-12 mb-1">
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" class="form-control" wire:model.lazy="image">

            @error('image')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

@include('common.modalFooter')
