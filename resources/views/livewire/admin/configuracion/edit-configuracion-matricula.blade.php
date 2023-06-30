<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="updateConfiguracion" class="bg-gray-300 dark:bg-gray-800 p-6">
                <x-errors class="mb-6" />
                
                
                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Editar fechas y precios de matriculación</h1>

                    <div class="col-span-12 sm:col-span-12">
                    <p>Las fechas están automatizadas, al seleccionar una fecha todos los meses tendrá el mes actual</p>
                    </div>
                

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Precio de la matrícula"
                            placeholder="Precio del cobro mensual de la  matrícula"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model.defer="precio_matricula"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">                        
                        <x-datetime-picker 
                            label="Fecha del 1er vencimiento"
                            without-time="false"
                            placeholder="Fecha de vencimiento" 
                            wire:model.defer="fecha_vencimiento"
                            :min="now()->startOfMonth()->format('Y-m-d')"
                            :max="now()->endOfMonth()->format('Y-m-d')"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-datetime-picker 
                            label="Fecha del 2do vencimiento"
                            without-time="false"
                            placeholder="Fecha de vencimiento" 
                            wire:model.defer="fecha_segundo_vencimiento" 
                            :min="now()->startOfMonth()->format('Y-m-d')"
                            :max="now()->endOfMonth()->format('Y-m-d')"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-inputs.number 
                            label="Recargo del 2do vencimiento"
                            wire:model.defer="recargo_despues_vencimiento"
                            hint="El valor es porcentual"
                        />
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 ml-2 sm:ml-8">
                    <x-button
                        wire:click="updateConfiguracion"
                        spinner="updateConfiguracion"
                        loading-delay="short"
                        violet
                        label="Modificar configuración"
                    />
                </div>

            </form>
        </div>
    </div>
</div>



