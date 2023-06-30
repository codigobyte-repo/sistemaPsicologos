<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="createLocalidad" class="bg-gray-300 dark:bg-gray-800 p-6">
                <x-errors class="mb-6" />

                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Crear nueva localidad</h1>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Nombre/s de la localidad/es"
                            placeholder="Nombre de localidad"
                            icon="home"
                            right-icon="pencil"
                            wire:model.defer="location"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Código 31662"
                            placeholder="Ingrese el código"
                            hint="Ejemplo para: Buenos Aires AR-B"
                            icon="location-marker"
                            right-icon="pencil"
                            wire:model.defer="codigo31662"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-button
                            wire:click="createLocalidad"
                            spinner="createLocalidad"
                            loading-delay="short"
                            violet
                            label="Crear localidad"
                        />
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
