<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="createRevistaMotivo" class="bg-gray-300 dark:bg-gray-800 p-6">
                <x-errors class="mb-6" />

                <div class="grid grid-cols-12 gap-2 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 text-center dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Precio de servicios</h1>

                    <div class="col-span-12 sm:col-span-12">
                        
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            N°
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de matrícula actual Categoría A
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de matrícula actual Categoría B
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de matrícula actual Categoría C
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de matrícula actual FID
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de multa
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de habilitaciones
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de supervisiones < 5
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de supervisiones > 5
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-left">
                                            Precio de supervisiones forenses
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($precios as $precio)
                                    
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $precio->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->matricula_actual_categoria_a, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->matricula_actual_categoria_b, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->matricula_actual_categoria_c, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->matricula_actual_fid, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->multa, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->habilitaciones, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->supervisiones_menos_5_anos, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->supervisiones_mas_5_anos, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($precio->supervisiones_forenses, 0, ',', '.') }}
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        
                    </div>
                    
                </div>
                <div class="px-6 py-4 text-left">
                    <div class="flex flex-wrap justify-center sm:justify-start gap-y-2">
                        <a href="{{ route('admin.precio-servicios.edit', $precio) }}" class="bg-purple-500 dark:bg-gray-600 hover:bg-purple-700 text-white text-sm py-1 px-1 sm:py-2 sm:px-4 rounded mr-4">Cambiar precios</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

