<div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
    
    <div class="overflow-hidden sm:rounded-lg">
        <form wire:submit.prevent="enviarNotificacion" class="bg-gray-300 dark:bg-gray-800 p-6">
            <x-errors class="mb-6" />

            <div class="m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 text-center uppercase">Crear nuevas notificaciones</h1>

                
                    <div class="mb-4">
                        <x-input type="text" 
                            label="Asunto del mensaje" 
                            placeholder="Ingrese el asunto"
                            wire:model.defer="subject"
                            right-icon="pencil-alt"
                        />
                    </div>

                    <div class="mb-4">

                        <x-textarea
                            label="Mensaje"
                            placeholder="Escriba su mensaje"
                            rows="4"
                            wire:model.defer="body"
                        />

                    </div>

                    <div class="mb-4">
                        <x-select
                            label="Seleccionar destinatario"
                            placeholder="Selecciona un usuario"
                            :async-data="route('api.getUsers')"
                            option-label="name"
                            option-description="lastname"
                            option-value="id"
                            wire:model.defer="to_user_id"
                        />
                    </div>

                    {{-- <div class="mb-4">
                        <x-label>Destinatario</x-label>
                    
                        <select name="to_user_id" class="border-gray-300 dark:border-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option value="" selected disabled>Seleccione un usuario</option>
                            @foreach ($users as $user)
                                <option wire:model.defer="to_user_id" id="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="col-span-6 sm:col-span-3">
                        <x-button
                            wire:click="enviarNotificacion"
                            spinner="enviarNotificacion"
                            loading-delay="short"
                            violet
                            label="Enviar"
                        />
                    </div>
            </div>
        </form>
    </div>
</div>
