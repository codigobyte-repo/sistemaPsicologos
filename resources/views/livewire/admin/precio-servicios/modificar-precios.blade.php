<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="updatePrecio" class="bg-gray-300 dark:bg-gray-800 p-6">
                
                <x-errors class="mb-6" />                
                
                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Editar/Modificar precios</h1>

                    <div class="col-span-12 sm:col-span-12">
                        <p>En este apartado puede modificar los precios de los diversos servicios</p>
                    </div>
                

                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Precio de la matrícula A"
                            placeholder="Precio del cobro mensual de la  matrícula A"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="precioA"
                        />
                    </div>

                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Precio de la matrícula B"
                            placeholder="Precio del cobro mensual de la  matrícula B"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="precioB"
                        />
                    </div>

                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Precio de la matrícula C"
                            placeholder="Precio del cobro mensual de la  matrícula C"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="precioC"
                        />
                    </div>


                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Precio de la matrícula actual FID"
                            placeholder="Precio de la matrícula actual FID"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="precioFid"
                        />
                    </div>

                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Precio de multa"
                            placeholder="Precio de multa"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="multa"
                        />
                    </div>

                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Precio de habilitaciones"
                            placeholder="Precio de habilitaciones"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="habilitaciones"
                        />
                    </div>

                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Supervisiones < a 5 años"
                            placeholder="Supervisiones < a 5 años"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="supervisiones_menos_5_anos"
                        />
                    </div>


                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Supervisiones > a 5 años"
                            placeholder="Supervisiones > a 5 años"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="supervisiones_mas_5_anos"
                        />
                    </div>


                    <div class="col-span-12 sm:col-span-4">
                        <x-input
                            label="Supervisiones forenses"
                            placeholder="Supervisiones forenses"
                            icon="currency-dollar"
                            right-icon="pencil"
                            wire:model="supervisiones_forenses"
                        />
                    </div>


                </div>

                <div class="col-span-6 sm:col-span-3 ml-2 sm:ml-8">
                    <x-button
                        wire:click="updatePrecio"
                        spinner="updatePrecio"
                        loading-delay="short"
                        violet
                        label="Actualizar precios"
                    />
                </div>

            </form>
        </div>
    </div>
</div>
