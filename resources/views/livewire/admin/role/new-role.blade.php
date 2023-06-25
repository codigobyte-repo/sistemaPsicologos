<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="createRol" class="bg-gray-300 dark:bg-gray-800 p-6">
                <x-errors class="mb-6" />

                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Crear nuevo rol del sistema</h1>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Nombre del rol"
                            placeholder="Nombre del rol"
                            icon="badge-check"
                            right-icon="pencil"
                            wire:model.defer="name"
                        />
                    </div>
                </div>
                
                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-2 uppercase">Asignación de permisos</h1>
                
                    <div class="col-span-6 sm:col-span-6">
                        <div class="flex flex-wrap justify-start space-x-4">
                            @foreach ($permissions as $permission)
                                <div class="m-4 flex items-center gap-2" wire:key="{{ $permission->id }}">
                                    
                                    <x-badge outline label="{{$permission->description}}" />

                                    <x-checkbox 
                                        id="left-label"
                                        md
                                        {{-- left-label="{{$permission->description}}"  --}}
                                        value="{{$permission->id}}" 
                                        wire:model.defer="selectedPermission"
                                        :checked="in_array($permission->id, $selectedPermission)"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-3 ml-2 sm:ml-8">
                    <x-button
                        wire:click="createRol"
                        spinner="createRol"
                        loading-delay="short"
                        violet
                        label="Crear rol"
                    />
                </div>

            </form>
        </div>
    </div>
</div>


