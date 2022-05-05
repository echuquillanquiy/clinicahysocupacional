<div>
    <x-slot name="job">
        {{ $job->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold mb-4">POSTULANTES DE LA CONVOCATORIA</h1>

    <x-table-responsive>
        <div class="px-6 py-4">
            <input wire:model="search" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block flex-1 shadow-sm sm:text-sm border-gray-300 rounded-md w-full" placeholder="Ingrese el nombre del postulante">
        </div>

        @if($applicants->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Correo Electronico
                    </th>

                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Telefóno
                    </th>

                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Residencia
                    </th>

                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($applicants as $applicant)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ $applicant->profile_photo_url }}" alt="{{ $applicant->title }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm text-gray-500">
                                        {{ $applicant->name }}, {{ $applicant->lastname }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $applicant->email }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $applicant->phone }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $applicant->place }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4">
                {{ $applicants->links() }}
            </div>

        @else
            <div class="px-6 pyy-4">
                <span class="text-md text-red-500">no hay resultados</span>
            </div>
        @endif

    </x-table-responsive>
</div>
