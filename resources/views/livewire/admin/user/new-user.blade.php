<div>
    <div class="max-w-7xl mx-auto md:py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="createUser" class="bg-gray-300 dark:bg-gray-800 p-6">
                <x-errors class="mb-6" />

                <div class="grid grid-cols-6 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Crear nuevo usuario del sistema</h1>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Nombre/s del Usuario"
                            placeholder="Ingresa nombres del usuario"
                            icon="user"
                            right-icon="pencil"
                            wire:model.defer="name"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Apellido/s de Usuario"
                            placeholder="Ingresa apellidos"
                            icon="user"
                            right-icon="pencil"
                            wire:model.defer="lastname"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-input
                            label="Email"
                            placeholder="Ingrese correo electrónico"
                            icon="mail"
                            suffix="@mail.com"
                            wire:model.defer="email"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-inputs.maskable
                            label="Matrícula (Si no usa MATRÍCULA debe usar DNI)"
                            placeholder="Ingresa número de matrícula"
                            icon="clipboard"
                            mask="####################"
                            hint="Sólo números sin puntos ni guiones"
                            right-icon="pencil"
                            wire:model.defer="matricula"
                        />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-inputs.maskable
                            label="Número de identidad (Si no usa DNI debe usar MATRÍCULA)"
                            placeholder="Ingresa número de dni"
                            icon="clipboard"
                            mask="####################"
                            hint="Sólo números sin puntos ni guiones"
                            right-icon="pencil"
                            wire:model.defer="dni"
                        />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3">
                        <x-inputs.password 
                            label="Contraseña"
                            id="password"
                            placeholder="Ingresar contraseña"
                            wire:model.defer="password" />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-3">
                        <x-inputs.password 
                            label="Confirmar contraseña"
                            placeholder="Confirmar contraseña"
                            id="password_confirmation"
                            wire:model.defer="password_confirmation" />
                    </div>

                    <br/>

                    <div class="col-span-6 sm:col-span-3">
                        <x-button
                            wire:click="createUser"
                            spinner="update"
                            loading-delay="short"
                            violet
                            label="Crear nuevo usuario"
                        />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

