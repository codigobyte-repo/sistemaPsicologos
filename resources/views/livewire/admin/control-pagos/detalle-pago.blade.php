<div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
    <div class="overflow-hidden sm:rounded-lg">
        <div class="bg-gray-300 dark:bg-gray-800 p-6">
            <x-errors class="mb-6" />

            <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h1 class="text-gray-400 text-center dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">
                    DETALLE DEL PAGO: <span class="font-semibold">{{ $pago['estado'] }}</span>
                </h1>

                <h1 class="text-gray-400 text-center dark:text-white col-span-full text-lg pt-2 pb-8">
                    Se debe verificar el comprobante y el pago, posteriomente puede cambiar el estado a APROBADO o RECHAZADO
                </h1>

                <div class="relative overflow-x-auto col-span-full">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    PRECIO DE COBRO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    FECHA DEL PAGO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ESTADO
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pago['id'] }}
                                </th>
                                <td class="px-6 py-4">
                                    ${{ $pago['precio'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pago['created_at'] }}
                                </td>
                                <td class="px-6 py-4 uppercase">
                                    {{ $pago['estado'] }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if ($pago['estado'] === 'rechazado')    
                    <div class="mb-6 col-span-full">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Comprobante</label>
                        <img src="{{ asset('comprobantes/'.$pago['comprobante_path']) }}" alt="Comprobante" class="w-80 h-45 object-cover object-center rounded-lg">
                    </div>
                @endif

                
                <div class="mt-4 col-span-3">
                    <div class="grid grid-cols-2 gap-4">
                        @if ($pago['estado'] === 'rechazado')
                            <x-button wire:click="aprobarPago" spinner="aprobarPago" loading-delay="short" violet label="Aprobar pago" />
                        @endif
                        <x-button wire:click="rechazarPago" spinner="rechazarPago" loading-delay="short" secondary label="Rechazar pago" />
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
