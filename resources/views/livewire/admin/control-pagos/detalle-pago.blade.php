<div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
    <div class="overflow-hidden sm:rounded-lg">
        <div class="bg-gray-300 dark:bg-gray-800 p-6">
            <x-errors class="mb-6" />

            <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h1 class="text-gray-400 text-center dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">
                    DETALLE DEL PAGO: 
                    <span class="font-semibold">
                        @if ($pago['estado'] === 'pendiente') 
                            <span style="background-color: #4C51BF;" class="px-2 py-1 rounded-md text-white">Pendiente</span>
                        @endif
                        @if ($pago['estado'] === 'aprobado') 
                            <span style="background-color: #34D399;" class="px-2 py-1 rounded-md text-white">Aprobado</span>
                        @endif
                        @if ($pago['estado'] === 'rechazado') 
                            <span style="background-color: #EF4444;" class="px-2 py-1 rounded-md text-white">Rechazado</span>
                        @endif
                        @if ($pago['estado'] === 'en_proceso') 
                            <span style="background-color: #000000;" class="px-2 py-1 rounded-md text-white">En proceso</span>
                        @endif
                    </span>
                </h1>

                @if ($pago['estado'] === 'rechazado') 
                    <p class="text-gray-700 text-center dark:text-white font-semibold col-span-full text-[16px] pt-1 pb-2">
                       Motivo de rechazo:  {{ $pago['motivos'] }}
                    </p>
                @endif

                <h1 class="text-gray-400 text-center dark:text-white col-span-full text-lg pt-2 pb-8">
                    Se debe verificar el comprobante y el pago, posteriomente puede cambiar el estado a APROBADO o RECHAZADO
                </h1>

                {{-- <div class="relative overflow-x-auto col-span-full">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    Otros Pagos de Matrícula
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    Meses abonados
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pago['id'] }}
                                </th>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($pago['estado'] == 'en_proceso')
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">En proceso</span>
                                    @endif

                                    @if($pago['estado'] == 'aprobado')
                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Aprobado</span>
                                    @endif
                                    
                                    @if($pago['estado'] == 'rechazado')
                                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rechazado</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['matricula'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['otros_pagos_matricula'], 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($pago['meses'])
                                        @foreach(json_decode($pago['meses']) as $mes)
                                            {{ $mes }}
                                        @endforeach
                                    @else
                                        No hay meses seleccionados.
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['matricula_anterior'], 2, ',', '.') }}
                                </td>                              
                                    
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['multa'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['multa_por_suspension'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['habilitaciones'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['ioma'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['supervisiones'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['cursos'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['carpeta_especialidad'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['escuelas'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['pago_cuentas'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['otros_pagos'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['importe_total'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['pago_enviado'], 2, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pago['created_at'])->format('d-m-Y') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}

                <div class="relative overflow-x-auto col-span-full">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left">
                                    N°
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    Campo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left">
                                    Valor
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Estado
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($pago['estado'] == 'en_proceso')
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">En proceso</span>
                                    @endif
                
                                    @if($pago['estado'] == 'aprobado')
                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Aprobado</span>
                                    @endif
                
                                    @if($pago['estado'] == 'rechazado')
                                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rechazado</span>
                                    @endif
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    2
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Matrícula
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['matricula'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    3
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Otros Pagos de Matrícula
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['otros_pagos_matricula'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    4
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Meses abonados
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($pago['meses'])
                                        @foreach(json_decode($pago['meses']) as $mes)
                                            {{ $mes }}
                                        @endforeach
                                    @else
                                        No hay meses seleccionados.
                                    @endif
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    5
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Matrícula anterior
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['matricula_anterior'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    6
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Multa
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['multa'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    7
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Multa por suspensión
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['multa_por_suspension'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    8
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Habilitaciones
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['habilitaciones'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    9
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Ioma
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['ioma'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    10
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Supervisiones
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['supervisiones'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    11
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Cursos
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['cursos'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    12
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Carpeta de especialidad
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['carpeta_especialidad'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    13
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Escuelas
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['escuelas'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    14
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Pago de cuentas
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['pago_cuentas'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    15
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Otros pagos
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['otros_pagos'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    16
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Descripción de otros pagos
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $pago['otros_pagos_descripcion'] }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    17
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Importe total
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['importe_total'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    18
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Pago enviado
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    $ {{ number_format($pago['pago_enviado'], 2, ',', '.') }}
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    19
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Fecha
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pago['created_at'])->format('d-m-Y') }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
                <div class="mb-6 col-span-full">
                    
                    <label class="text-gray-400 mx-auto text-center dark:text-white col-span-full text-lg pt-2 pb-8">
                        COMPROBANTES
                    </label>

                    <div class="cursor-pointer mt-4">
                        @foreach($pago->images as $image)
                            @if (pathinfo($image->path, PATHINFO_EXTENSION) == 'pdf')
                                <!-- Mostrar el PDF -->
                                <embed src="{{ Storage::url($image->path) }}" type="application/pdf" width="100%" height="600px">
                                
                            @else
                                <!-- Mostrar la imagen -->
                                <a href="{{ Storage::url($image->path) }}" target="_blank">
                                    <img src="{{ Storage::url($image->path) }}" class="picture">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <div class="mt-4 col-span-3">
                    <div class="grid grid-cols-2 gap-4">
                        @if ($pago['estado'] != 'aprobado')
                            <x-button wire:click="aprobarPago" spinner="aprobarPago" loading-delay="short" violet label="Aprobar pago" />
                            
                            @if($pago['estado'] != 'rechazado')
                                <x-button wire:click="rechazarPago" spinner="rechazarPago" loading-delay="short" secondary label="Rechazar pago" />
                            @endif
                        @endif
                    </div>
                </div> 
                
                @if ($rechazar)
                    
                    <div class="mt-4 col-span-full">
                        <x-textarea wire:model="motivos" label="Motivo" placeholder="Ingrese el motivo del rechazo" />
                        
                        <div class="my-4">
                            <div class="grid grid-cols-2 gap-4">
                                <x-button wire:click="pagoRechazado" spinner="pagoRechazado" loading-delay="short" red label="Confirmar pago rechazado" />
                                <x-button wire:click="cancelar" spinner="cancelar" loading-delay="short" secondary label="Cancelar" />
                            </div>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>
</div>
