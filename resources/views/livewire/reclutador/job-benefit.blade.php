<div>
    <x-slot name="job">
        {{ $job->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold">BENEFICIOS DE LA CONVOCATORIA</h1>
    <hr class="mt-2 mb-6">

    @foreach($job->benefits as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if($benefit->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="benefit.name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese un beneficio">

                        @error('benefit.name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer"><strong>Beneficio: </strong>{{ $item->name }}</h1>

                        <div>
                            <i wire:click="edit({{ $item }})" class="fas fa-edit cursor-pointer text-blue-500"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500"></i>
                        </div>
                    </header>
                @endif

            </div>
        </article>
    @endforeach


    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="fas fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nuevo beneficio
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar nuevo beneficio</h1>

                <div class="mb-4">
                    <input wire:model="name" type="text" class="w-full rounded-lg" placeholder="Registre el nuevo beneficio">

                    @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>

</div>
