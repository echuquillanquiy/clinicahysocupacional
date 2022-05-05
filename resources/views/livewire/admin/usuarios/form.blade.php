@include('common.modalHeader')

<div class="row">
    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <div class="form-group">
            <label for="name">Nombres</label>
            <input type="text" class="form-control" wire:model.lazy="name">

            @error('name')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <div class="form-group">
            <label for="lastname">Apellidos</label>
            <input type="text" class="form-control" wire:model.lazy="lastname">

            @error('lastname')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-12 col-md-6 col-12 mb-1">
        <div class="form-group">
            <label for="email">Correo electronico</label>
            <input type="text" class="form-control" wire:model.lazy="email">

            @error('email')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" wire:model.lazy="username">

            @error('username')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <label for="profile">Perfil</label>
        <select wire:model="profile" class="form-control">
            <option value="Elegir">Seleccione un Perfil</option>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>

        @error('profile')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" class="form-control" wire:model.lazy="phone">

            @error('phone')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" wire:model.lazy="password">

            @error('password')
            <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <label for="profile">Local</label>
        <select wire:model="place" class="form-control">
            <option value="Elegir">Seleccione un Perfil</option>
            <option value="HUANCAYO">HUANCAYO</option>
            <option value="LIMA">LIMA</option>
            <option value="PASCO">PASCO</option>
            <option value="SAN RAMON">SAN RAMON</option>
            <option value="HUANCAVELICA">HUANCAYO</option>
        </select>

        @error('place')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

    <div class="col-xl-6 col-md-6 col-12 mb-1">
        <label for="profile">Estado</label>
        <select wire:model="status" class="form-control">
            <option value="Elegir">Seleccione un Perfil</option>
            <option value="active">ACTIVO</option>
            <option value="blocked">INACTIVO</option>
        </select>

        @error('status')
        <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>

</div>

@include('common.modalFooter')
