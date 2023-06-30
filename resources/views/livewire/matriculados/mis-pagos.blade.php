<div>
    
    <div class="mb-10">
        <x-card title="Próximo vencimiento">
            
                <div class="mx-6 my-6 bg-white">            	
                    Para pagar la obligación correspondiente al período, podés abonar directamente con transferencia bancaria, tarjeta de débito o tarjeta de crédito.
                    <br/>
                    Período: 
                    <span class="uppercase font-semibold">
                        {{-- Esta función sólo muestra el mes --}}
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $datosMatricula->first()->fecha_vencimiento)->locale('es')->isoFormat('MMMM') }} 
                    </span>
                    <br/> <br/>
                    Fecha de del 1er vencimiento:
                        {{-- Esta función muestra el formato d-m-Y --}}
                        <span class="uppercase font-semibold">
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $datosMatricula->first()->fecha_vencimiento)->format('d-m-Y') }}
                        </span>

                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-850 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-l-lg">
                                    Obligación
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3 rounded-r-lg">
                                    Precio
                                </th>
                            </tr>
                        </thead>
                        @foreach ($datosMatricula as $datos)
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Renovación de matriculación
                                    </th>
                                    <td class="px-6 py-4">
                                        1
                                    </td>
                                    
                                        
                                    <td class="px-6 py-4">
                                        $ {{ number_format($datos->precio_matricula, 2, ',', '.') }}
                                    </td>
                                    
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white bg-purple-300">
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3">1</td>
                                    <td class="px-6 py-3">$ {{ number_format($datos->precio_matricula, 2, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        @endforeach
                    </table>
                </div>

                <div class="mt-10">
                    <div class="mx-6 my-6 bg-white">
                        Fecha de del 2do vencimiento: 
                            {{-- Esta función muestra el formato d-m-Y --}}
                            <span class="uppercase font-semibold">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $datosMatricula->first()->fecha_segundo_vencimiento)->format('d-m-Y') }}
                            </span>
                        <span class="font-semibold">Con recargo del % {{ intval($datosMatricula->first()->recargo_despues_vencimiento) }}</span>

                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-850 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                                        Obligación
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cantidad
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                                        Precio
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($datosMatricula as $datos)
                                <tbody>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Renovación de matriculación
                                        </th>
                                        <td class="px-6 py-4">
                                            1
                                        </td>
                                        
                                            
                                        <td class="px-6 py-4">
                                            $ {{ number_format($datos->precio_matricula, 2, ',', '.') }}
                                        </td>
                                        
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="font-semibold text-gray-900 dark:text-white bg-red-300">
                                        <th scope="row" class="px-6 py-3 text-base">Total</th>
                                        <td class="px-6 py-3">1</td>
                                        <td class="px-6 py-3">$ {{ number_format($datos->precio_matricula, 2, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            @endforeach
                        </table>
                    </div>

                </div>

        </x-card>
    </div>

    <div class="mb-10">
        <x-card title="Realizar transferencia bancaria">
            
            <div class="mx-6 my-6 bg-white">
                
                <div class="my-6">                    
                    <p class="mb-3 text-gray-500 dark:text-gray-400 first-line:uppercase first-line:tracking-widest">
                        Datos de transferencia bancaria
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">
                        Por transferencia bancaria, es importante que adjunte su comprobante a través del siguiente formulario.
                    </p>
                </div>

                <div class="bg-gray-200 shadow-md my-4 px-4 py-10 text-base mb-8">
                    <p class="my-2">DATOS BANCARIOS</p>
                    <p>CUENTA SANTANDER</p>
                    <p>CBU: 4654546546546546544654564465</p>
                    <p>ALIAS: Sistema-Psicologia</p>
                </div>

                <div>
                    <form wire:submit.prevent="PagoTransferencia">
                        <x-input 
                            type="file" 
                            label="Subir comprobante"
                            placeholder="Seleccione el comprobante" 
                            hint="Adjuntar comprobante" 
                            wire:model="comprobante"
                            wire:loading.attr="disabled"
                        />
                        <br/>
                        
                        <div class="mt-8" wire:loading>
                            <x-button spinner="PagoTransferencia" loading-delay="short" violet label="Enviar comprobante" disabled>
                                Subiendo comprobante...
                            </x-button>
                        </div>
                        <div class="mt-8" wire:loading.remove>
                            <x-button wire:click="PagoTransferencia" spinner="PagoTransferencia" loading-delay="short" violet label="Enviar comprobante" />
                        </div>
                    </form>
                </div>

            </div>

        </x-card>
    </div>

</div>
