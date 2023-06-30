<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="createRevistaMotivo" class="bg-gray-300 dark:bg-gray-800 p-6">
                <x-errors class="mb-6" />

                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 text-center dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Lista de fechas & Precios</h1>

                    <div class="col-span-12 sm:col-span-12">
                        
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio de matrícula
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Primera fecha de vencimiento
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Porcentaje precio de matrícula con recargo
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Segunda fecha de vencimiento
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Operación
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($configuraciones as $configuracion)
                                    
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4">
                                                {{ $configuracion->id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                $ {{ number_format($configuracion->precio_matricula, 2, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $configuracion->fecha_vencimiento)->format('d-m-Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                % {{ intval($configuracion->recargo_despues_vencimiento) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $configuracion->fecha_segundo_vencimiento)->format('d-m-Y') }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <div class="flex flex-wrap justify-center sm:justify-end gap-y-2">
                                                    <a href="{{ route('admin.configuracion-matricula.edit', $configuracion) }}" class="bg-blue-500 dark:bg-gray-600 hover:bg-blue-700 text-white font-bold py-1 px-1 sm:py-2 sm:px-4 rounded mr-4">Editar</a>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
