<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="update" class="bg-gray-300 dark:bg-gray-800 p-6">
                <x-errors class="mb-6" />

                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Editar de
                        datos del usuario</h1>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input label="Nombre/s del Matriculado" placeholder="Ingresa nombres del matriculado"
                            icon="user" right-icon="pencil" wire:model.defer="name" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input label="Apellido/s de Matriculado" placeholder="Ingresa apellidos" icon="user"
                            right-icon="pencil" wire:model.defer="lastname" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input label="Email" placeholder="Ingrese correo electrónico" icon="mail"
                            suffix="@mail.com" wire:model.defer="email" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-inputs.maskable label="Matrícula" placeholder="Ingresa número de matrícula" icon="clipboard"
                            hint="Sólo números sin puntos ni guiones" mask="####################" right-icon="pencil"
                            wire:model.defer="matricula" />
                    </div>
                    
                </div>


                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-2 uppercase">Listado de roles</h1>

                    <div class="col-span-6 sm:col-span-3">
                        @foreach ($roles as $role)
                            <div class="m-4" wire:key="{{ $role->id }}">
                                <x-checkbox 
                                    id="left-label" 
                                    left-label="{{$role->name}}" 
                                    value="{{$role->id}}" 
                                    wire:model.defer="selectedRoles"
                                    :checked="in_array($role->id, $selectedRoles)"/>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 ml-2 sm:ml-8">
                    <x-button wire:click="update" spinner="update" loading-delay="short" violet
                        label="Actualizar matriculado" />
                </div>
                
            </form>
        </div>
    </div>
</div>
