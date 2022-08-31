<div class="container-fluid">

    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:model="search" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block flex-1 shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese el titulo de la convocatoria">
            <a href="{{ route('reclutador.jobs.create') }}" class="btn btn-danger ml-1">Crear nueva convocatoria</a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Postulantes
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Horario
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Sede
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha de caducidad
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado
                </th>

                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($jobs as $job)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                @isset($job->image)
                                    <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ Storage::url($job->image->url) }}" alt="{{ $job->title }}">
                                @else
                                    <img id="picture" class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?cs=srgb&dl=pexels-karolina-grabowska-4498362.jpg&fm=jpg" alt="">
                                @endisset
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $job->title }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $job->area->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $job->applicants->count() }}</div>
                        <div class="text-sm text-gray-500">postulantes</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $job->schedule->name }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $job->place->name }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($job->ending > \Carbon\Carbon::now())
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $job->ending }}</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                            {{ $job->ending }}
                        </span>
                        @endif

                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($job->status)
                            @case(1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Borrador
                            </span>
                            @break

                            @case(2)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Publicado
                            </span>
                            @break
                        @endswitch
                    </td>


                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('reclutador.jobs.edit', $job) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4">
            {{ $jobs->links() }}
        </div>
    </x-table-responsive>

</div>


