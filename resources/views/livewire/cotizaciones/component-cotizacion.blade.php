<div>
    <div class="contact-area bg-gray text-center default-padding">
        <div class="container">
            <div class="row">
                <div class="contact-items">
                    <div class="col-md-12 contact-form">
                        <div class="site-heading text-center">
                            <h2>SOLICITE SU <span>COTIZACIÓN</span></h2>
                        </div>
                        <div class="contact-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" wire:model="ruc" placeholder="RUC" type="number">
                                        @error('ruc')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input class="form-control" wire:model="name" placeholder="Razón Social" type="text">
                                        @error('name')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" wire:model="email" placeholder="Correo electronico" type="email">
                                        @error('email')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input class="form-control" wire:model="phone" placeholder="Telefono de contacto" type="text">
                                        @error('phone')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input class="form-control" wire:model="contact" placeholder="Nombre de Contacto" type="text">
                                        @error('contact')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" wire:model="position" placeholder="Cargo en la empresa" type="text">
                                        @error('position')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" wire:model="workers" placeholder="Número de trabajadores" type="number">
                                        @error('workers')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" wire:model="positions" placeholder="Cargos en la empresa"></textarea>
                                        @error('positions')
                                            <span class="text-danger er">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="button" wire:click.prevent="Store()">
                                        Solicitar Cotización <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('guardado', msg => {
            alert(msg)
        })
    })
</script>
