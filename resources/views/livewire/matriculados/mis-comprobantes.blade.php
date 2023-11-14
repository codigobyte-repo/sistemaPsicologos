<div class="mb-10">
    
        <x-card title="Mis comprobantes">

            <div class="mx-2 my-6 bg-white">            	
                En este apartado podrá obtener los ultimos 6 detalles de anuncios de pagos.
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-900 divide-y divide-gray-200">
                    <thead class="text-xs font-semibold text-gray-800 bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left">
                                N°
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Matrícula
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Matrícula anterior
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Multa
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Multa por suspension
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Habilitaciones
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Ioma
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                Supervisiones
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Cursos
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Carpeta especialidad
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Escuelas
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Pago cuentas
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Otros pagos
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Importe total
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Pago enviado
                            </th>
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Fecha
                            </th>
                            </th><th scope="col" class="px-6 py-3 text-left">
                                Imprimir PDF
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $counter=1;?>
                        @forelse ($pagos as $pago)
                            <tr class="bg-white dark:bg-gray-800">

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo $counter;?>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($pago->estado == 'en_proceso')
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">En proceso</span>
                                    @endif

                                    @if($pago->estado == 'aprobado')
                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Aprobado</span>
                                    @endif
                                    
                                    @if($pago->estado == 'rechazado')
                                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rechazado</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->matricula, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->matricula_anterior, 0, ',', '.') }}
                                </td>                              
                                    
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->multa, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->multa_por_suspension, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->habilitaciones, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->ioma, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->supervisiones, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->cursos, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->carpeta_especialidad, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->escuelas, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->pago_cuentas, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->otros_pagos, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->importe_total, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago->pago_enviado, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pago->created_at)->format('d-m-Y') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer" target="to_blank" href="{{ url('/generar-pdf', $pago->id) }}">Comprobante</a>
                                </td>

                            </tr>
                            <?php $counter++;?>
                        @empty
                    </tbody>
                    <tr>
                        <td colspan="14" class="px-6 py-4 text-center">
                            Por el momento no tiene comprobantes.
                        </td>
                    </tr>
                    @endforelse
                </table>
            </div>

        </x-card>
    
</div>
