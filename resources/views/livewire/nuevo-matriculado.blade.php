<div>
    
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="save" class="bg-gray-300 dark:bg-gray-800 p-6">

                <x-errors class="mb-6" />

                
                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Datos de matriculación</h1>
                    
                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Nombre/s del Matriculado"
                            placeholder="Ingresa nombres del matriculado"
                            corner-hint="Ejemplo: Mariana"
                            icon="user"
                            right-icon="pencil" 
                            wire:model.defer="nombre_matriculado"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Apellido/s de Matriculado"
                            placeholder="Ingresa apellidos"
                            corner-hint="Ejemplo: Pérez"
                            icon="user"
                            right-icon="pencil"
                            wire:model.defer="apellido_matriculado"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input class="pr-28" label="Email" placeholder="Ingrese correo electrónico" icon="mail" right-icon="pencil" wire:model.defer="correo_electronico" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-inputs.maskable
                            label="Matrícula"
                            placeholder="Ingresa número de matrícula"
                            corner-hint="Ejemplo: 79854"
                            icon="clipboard"
                            mask="####################"
                            hint="Sólo números sin puntos ni guiones"
                            right-icon="pencil"
                            wire:model.defer="numero_matriculado"
                        />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3">
                        <x-button wire:click="save" spinner="save" loading-delay="short" violet label="Crear matriculado" />
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
