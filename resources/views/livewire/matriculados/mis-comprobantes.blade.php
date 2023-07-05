<div class="mb-10">
    
        <x-card title="Mis comprobantes">

            <div class="mx-6 my-6 bg-white">            	
                En este apartado podrá obtener los ultimos 6 detalles de pagos y descargar los comprobantes.
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-850 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Factura
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de emisión
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de pago
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Comprobante
                            </th>
                        </tr>
                    </thead>
                    @forelse ($facturas as $factura)
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-6 py-4">
                                    {{ $factura->numero_factura }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $factura->pago->descripcion }}
                                </td>

                                <td class="px-6 py-4">                                    
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $factura->fecha_emision)->format('d-m-Y') }}
                                </td>                                
                                    
                                <td class="px-6 py-4">
                                    $ {{ number_format($factura->pago->precio, 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $factura->pago->created_at)->format('d-m-Y') }}
                                </td>

                                <td class="px-6 py-4">
                                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer" target="to_blank" href="{{ url('/generar-pdf', $factura->id) }}">Comprobante</a>
                                </td>                                
                            </tr>
                        </tbody>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center">
                                Por el momento no tiene comprobantes.
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>

        </x-card>
    
</div>
