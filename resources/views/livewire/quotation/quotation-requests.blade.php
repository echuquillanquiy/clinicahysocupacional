<div class="container-fluid">

    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:model="search" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block flex-1 shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ingrese el titulo de la convocatoria">
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    FECHA SOLICITUD
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    RUC / RAZÓN SOCIAL
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    CORREO / TELEFONO
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    CONTACTO / CARGO
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    N° DE TRABAJADORES
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    CARGOS
                </th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ESTADO
                </th>

                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Cotizar</span>
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Pdf</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($quotations as $quotation)
                <tr>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-blue-800">
                            {{ $quotation->created_at->format('Y-m-d') }}
                        </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $quotation->ruc }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $quotation->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $quotation->email }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $quotation->phone }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $quotation->contact }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $quotation->position }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800 text-center">
                            {{ $quotation->workers }}
                        </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                            {{ $quotation->positions }}
                        </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($quotation->status)
                            @case(1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Recibido
                            </span>
                            @break

                            @case(2)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Pendiente
                                </span>
                            @break

                            @case(3)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Cotizado
                                </span>
                                @break
                        @endswitch
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('generar.Cotizacion', $quotation) }}" class="text-indigo-600 hover:text-white btn btn-danger">Cotizar</a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="" class="text-indigo-600 hover:text-blue-500">
                            Imprimir
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="px-6 py-4">

        </div>
    </x-table-responsive>

</div>



