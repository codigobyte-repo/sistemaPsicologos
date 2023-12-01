<div>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        {{-- @if (session()->has('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 7000)" x-show="show" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded my-6 relative" role="alert">
                <strong class="font-bold">Mensaje:</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Salir</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
            </div>
        @endif --}}

        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="save" class="bg-gray-300 dark:bg-gray-800 p-6">

                <x-errors class="mb-6" />

                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Datos de matriculación</h1>

                    <div class="col-span-12 md:col-span-6">
                        <x-input type="date" 
                            label="Fecha de Matriculación"
                            without-time="false"
                            placeholder="Seleccione fecha de matriculación" 
                            wire:model.defer="fecha_matriculacion" 
                            />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-select
                            label="Distrito de Matriculas"
                            placeholder="Selecciona un distrito"
                            :async-data="route('api.distritos-matriculas')"
                            option-label="nombre"
                            icon="office-building"
                            option-value="id"
                            wire:model.defer="distrito_matriculas_id"
                        />
                    </div>
                    
                    <div class="col-span-12 md:col-span-6">
                        <x-select 
                            label="Distrito Revistas"
                            placeholder="Selecciona un distrito de revista"
                            :async-data="route('api.distritos-revistas')"
                            option-label="nombre"
                            icon="office-building"
                            option-value="id"
                            wire:model.defer="distrito_revistas_id" 
                        />
                    </div>

                    <div class="col-span-12 md:col-span-6">

                        <x-native-select
                            label="Estado Observación"
                            placeholder="Selecciona un estado"
                            wire:model.defer="estado_observacion"
                        >
                        
                            <option>--Seleccionar un estado--</option>
                            <option value="1">Recepcionado</option>
                            <option value="2">Otro</option> 
            
                        </x-native-select>
            
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-select 
                            label="Situación Revistas"
                            icon="pencil-alt"
                            placeholder="Selecciona una situación de revista"
                            :async-data="route('api.situaciones-revistas')"
                            option-label="nombre"
                            option-value="id"
                            wire:model.defer="situacion_revistas_id" 
                        />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-select 
                            label="Motivo Situación Revista"
                            icon="pencil-alt"
                            placeholder="Selecciona un motivo de revista"
                            :async-data="route('api.motivos-situacion-revista')"
                            option-label="nombre"
                            option-value="id"
                            wire:model.defer="situacion_revista_motivos_id" 
                        />
                    </div>
                    
                    <div class="col-span-12 md:col-span-6">
                        <x-input type="date"  
                            label="Fecha Situación Revista"
                            without-time="false"
                            placeholder="Seleccione fecha de revista" 
                            wire:model.defer="situacion_de_revista_fecha" 
                        />
                    </div>

                </div>
                
                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Datos personales</h1>
                    
                    <div class="col-span-12 sm:col-span-4">
                        <x-input type="date" 
                            wire:model.defer="fecha_nacimiento" 
                            label="Fecha Nacimiento"
                            without-time="false"
                            placeholder="Seleccione fecha de nacimiento" 
                            />
                    </div>

                    <div class="col-span-12 sm:col-span-4">

                        <x-native-select
                            label="Tipo Documento"
                            placeholder="Selecciona un tipo de documento"
                            wire:model.defer="tipo_documento"
                        >
                    
                            <option>--Selecciona un tipo--</option>
                            <option value="1">DNI</option>
                            <option value="2">LE</option>
                            <option value="3">LC</option>
                            <option value="4">CI</option>
            
                        </x-native-select>
            
                    </div>
                    
                    <div class="col-span-12 sm:col-span-4">
                        <x-input type="text" 
                            icon="identification"
                            right-icon="pencil"
                            placeholder="Ingrese documento identificador"
                            wire:model.defer="documento_nro" 
                            label="Número Documento"
                            hint="Sólo números sin puntos ni guiones"
                            {{-- validador javascript de sólo números --}}
                            class="input-mask"
                            />
                    </div>
                    
                    <div class="col-span-12 sm:col-span-4">
                        <x-input type="text"
                            icon="identification"
                            right-icon="pencil"
                            placeholder="Ingrese cuit identificador"
                            wire:model.defer="cuit" 
                            label="CUIT"
                            hint="Sólo números sin puntos ni guiones"
                            {{-- validador javascript de sólo números --}}
                            class="input-mask"
                            />
                    </div>

                    <div class="col-span-12 sm:col-span-4">
                        <x-select 
                            label="Nacionalidad"
                            icon="globe-alt"
                            placeholder="Selecciona una nacionalidad"
                            :async-data="route('api.nationalities')"
                            option-label="pais"
                            option-value="id"
                            wire:model.defer="nationalities_id" 
                        />
                    </div>

                    <div class="col-span-12 sm:col-span-4">

                        <x-native-select
                            label="Genero"
                            placeholder="Selecciona un genero"
                            wire:model.defer="genero"
                        >
                            <option>--Selecciona un genero--</option>
                            <option value="2">Femenino</option>
                            <option value="1">Masculino</option> 
            
                        </x-native-select>
            
                    </div>

                </div>


                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-4 uppercase">Domicilios</h1>

                    
                    <h1 class="text-gray-400 dark:text-white col-span-full text-base">Domicilio particular</h1>

                    <div class="col-span-12">
                        <x-input type="text" 
                            wire:model.defer="domicilio_particular"
                            icon="pencil-alt"
                            right-icon="pencil"
                            label="Domicilio Particular"/>
                    </div>
                    {{-- Se cambio Localidad por el nombre provincia a pedido del Colegio --}}
                    <div class="col-span-12 md:col-span-5">
                        <x-select 
                            label="Provincia Domicilio Particular"
                            icon="globe-alt"
                            placeholder="Selecciona una provincia"
                            :async-data="route('api.localidades')"
                            option-label="location"
                            option-value="location"
                            wire:model="domicilio_particular_localidad"
                        />
                    </div>

                    {{-- Se cambio monicipio por el nombre localidad a pedido del Colegio --}}
                    <div class="col-span-12 md:col-span-5">
                        <x-select 
                            label="Localidad Domicilio Particular"
                            icon="globe-alt"
                            placeholder="Selecciona una localidad"
                            :options="$municipios"
                            option-label="name"
                            option-value="name"
                            wire:model="domicilio_particular_municipio"
                        />
                    </div>

                    <div class="col-span-6  sm:col-span-2">
                        <x-input disabled type="text" 
                            wire:model="domicilio_particular_codigo_postal"
                            icon="pencil-alt"
                            label="Código Postal"/>
                    </div>

                    <h1 class="text-gray-400 dark:text-white col-span-full text-base pt-4 pb-2">Domicilio profesional</h1>

                    <div class="col-span-12">
                        <x-input type="text"
                            wire:model.defer="domicilio_profesional"
                            icon="pencil-alt"
                            right-icon="pencil"
                            label="Domicilio Profesional"/>
                    </div>

                    {{-- Se cambio localidad por el nombre provincia a pedido del Colegio --}}
                    <div class="col-span-12 md:col-span-5">
                        <x-select
                            label="Provincia Domicilio Profesional"
                            icon="globe-alt"
                            placeholder="Selecciona una provincia"
                            :async-data="route('api.localidades')"
                            option-label="location"
                            option-value="location"
                            wire:model="domicilio_profesional_localidad"
                            />
                    </div>

                    {{-- Se cambio municipio por el nombre localidad a pedido del Colegio --}}
                    <div class="col-span-12 md:col-span-5">
                        <x-select
                            label="Localidad Domicilio Profesional"
                            icon="globe-alt"
                            placeholder="Selecciona una localidad"
                            :options="$municipiosProfesional"
                            option-label="name"
                            option-value="name"
                            wire:model="domicilio_profesional_municipio"/>
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <x-input type="text" disabled
                            wire:model="domicilio_profesional_codigo_postal"
                            icon="pencil-alt"
                            label="Código Postal"/>
                    </div>
                    
                </div>

                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Teléfonos</h1>
                    
                    <div class="col-span-12 md:col-span-6">
                        <x-input type="text" 
                            wire:model.defer="domicilio_profesional_telefonos"
                            icon="phone"
                            right-icon="pencil"
                            label="Teléfono Domicilio Profesional"
                            hint="Sólo números sin puntos ni guiones"
                            {{-- validador javascript de sólo números --}}
                            class="input-mask"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input type="text" 
                            wire:model.defer="domicilio_profesional_telefonos_alternativo"
                            icon="phone"
                            right-icon="pencil"
                            label="Teléfono Domicilio Profesional Alternativo"
                            hint="Sólo números sin puntos ni guiones"
                            {{-- validador javascript de sólo números --}}
                            class="input-mask"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input type="text" 
                            wire:model.defer="domicilio_particular_telefonos"
                            icon="phone"
                            right-icon="pencil"
                            label="Teléfono Domicilio Particular"
                            hint="Sólo números sin puntos ni guiones"
                            {{-- validador javascript de sólo números --}}
                            class="input-mask"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-input type="text" 
                            wire:model.defer="domicilio_particular_telefonos_alternativo"
                            icon="phone"
                            right-icon="pencil"
                            label="Teléfono Domicilio Particular Alternativo"
                            hint="Sólo números sin puntos ni guiones"
                            {{-- validador javascript de sólo números --}}
                            class="input-mask"
                            />
                    </div>

                </div>

                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Datos universitarios</h1>

                    <div class="col-span-12 md:col-span-6">
                        <x-select 
                            label="Universidad"
                            icon="library"
                            placeholder="Selecciona una universidad"
                            :async-data="route('api.universities')"
                            option-label="nombre"
                            option-value="id"
                            wire:model.defer="universities_id" 
                        />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-select 
                            label="Título Universitario"
                            icon="academic-cap"
                            placeholder="Selecciona un título universitario"
                            :async-data="route('api.titulos-universitarios')"
                            option-label="nombre"
                            option-value="id"
                            wire:model.defer="titulo_universitarios_id" 
                        />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-input type="date" 
                            label="Fecha Expedición Título"
                            wire:model.defer="fecha_expedicion_titulo" 
                            without-time="false"
                            placeholder="Seleccione fecha de expedición" 
                            />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-input type="date" 
                            label="Fecha Ejercicio Desde"
                            wire:model.defer="fecha_ejercicio_desde" 
                            without-time="false"
                            placeholder="Seleccione fecha de ejercicio" 
                            />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-input type="date" 
                            label="Fecha Terminación Estudios"
                            wire:model.defer="fecha_terminacion_estudios" 
                            without-time="false"
                            placeholder="Seleccione fecha de terminación de estudios" 
                            />
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Otros datos</h1>

                    <div class="col-span-12 md:col-span-3">
                        <x-input type="text" wire:model.defer="actuacion_gp_cdd" 
                                    label="Actuación GP CDD"
                                    icon="pencil-alt"
                                    right-icon="pencil"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-input type="text" wire:model.defer="actuacion_gp_cs" 
                                    label="Actuación GP CS"
                                    icon="pencil-alt"
                                    right-icon="pencil"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-input type="text" wire:model.defer="actuacion_gp_tdd" 
                                    label="Actuación GP TDD"
                                    icon="pencil-alt"
                                    right-icon="pencil"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-input type="text" wire:model.defer="actuacion_gp_tsd" 
                                    label="Actuación GP TSD"
                                    icon="pencil-alt"
                                    right-icon="pencil"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-input type="text" wire:model.defer="registrado_tomo" 
                                    label="Registrado Tomo"
                                    icon="pencil-alt"
                                    right-icon="pencil"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-3">
                        <x-input type="text" wire:model.defer="registrado_folio" 
                                    label="Registrado Folio"
                                    icon="pencil-alt"
                                    right-icon="pencil"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-3">

                        <x-native-select
                            label="Categoría"
                            placeholder="Selecciona una categoría"
                            wire:model.defer="categoria"
                        >
                        
                            <option>--Selecciona una categoría--</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
            
                        </x-native-select>
            
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Observaciones</h1>

                    <div class="col-span-12">
                        <x-input id="ckeditor" type="text" wire:model.defer="observaciones" label="Observaciones"/>
                    </div>
                </div>
                

                <div class="mt-8 pl-2 md:pl-8">
                    <x-button wire:click="save" spinner="save" loading-delay="short" violet label="Crear matriculado" />
                </div>
                
            </form>
        </div>
    </div>

    
    {{-- @push('js') --}}
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}
        {{-- <script src="{{asset('assets/plugins/ckeditor5-build-classic/ckeditor.js')}}"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#ckeditor' ),{
                    toolbar: [ 'bold', 'italic' ], // solo las opciones que deseas
                    image: false, // deshabilita la carga de imágenes
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script> --}}
    

        {{-- <script>
            const inputs = document.querySelectorAll('.input-mask');

            inputs.forEach(input => {
                input.addEventListener('input', function (event) {
                    let value = event.target.value;
                    value = value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                    value = value.substring(0, 20); // Limitar a 20 caracteres

                    event.target.value = value;
                });
            });
        </script> --}}

    {{-- @endpush --}}

</div>