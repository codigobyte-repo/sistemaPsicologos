<div>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="overflow-hidden sm:rounded-lg">
            <form wire:submit.prevent="save" class="bg-gray-300 dark:bg-gray-800 p-6">

                <x-errors class="mb-6" />

                <div class="grid grid-cols-12 gap-6 m-2 md:m-8 p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h1 class="text-gray-400 mx-auto dark:text-white col-span-full text-lg pt-2 pb-8 uppercase">Datos de matriculación: <span class="text-gray-800 font-semibold"> {{ $datos_usuario->name }} {{ $datos_usuario->lastname }} </span></h1>

                    <div class="col-span-12 sm:col-span-6">
                        <x-input type="text" 
                            icon="identification"
                            right-icon="pencil"
                            placeholder="Ingrese documento identificador"
                            wire:model.defer="matricula" 
                            label="Matrícula"
                            hint="Sólo números sin puntos ni guiones"
                            class="input-mask"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <x-datetime-picker 
                            label="Fecha de Matriculación"
                            without-time="false"
                            placeholder="Seleccione fecha de matriculación" 
                            wire:model.defer="fecha_matriculacion" 
                            />
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <span class="text-sm text-gray-800">Distrito de Matrículas</span>
                        <select wire:model="distrito_matriculas_id" name="distrito" class="w-full h-10 rounded-lg border border-gray-200 focus:border-indigo-500">                            
                            @foreach($distrito_matriculas as $distrito)
                                <option value="{{ $distrito->id }}" @if($distrito->id == $distrito_matriculas_id) selected @endif>{{ $distrito->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <span class="text-sm text-gray-800">Distrito Revistas</span>
                        <select wire:model="distrito_revistas_id" name="revista" class="w-full h-10 rounded-lg border border-gray-200 focus:border-indigo-500">                            
                            @foreach($distrito_revistas as $revista)
                                <option value="{{ $revista->id }}" @if($revista->id == $distrito_revistas_id) selected @endif>{{ $revista->nombre }}</option>
                            @endforeach
                        </select>
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
                        <span class="text-sm text-gray-800">Situación Revistas</span>
                        <select wire:model="situacion_revistas_id" name="revista" class="w-full h-10 rounded-lg border border-gray-200 focus:border-indigo-500">                            
                            @foreach($situacion_revistas as $situacion)
                                <option value="{{ $situacion->id }}" @if($situacion->id == $situacion_revistas_id) selected @endif>{{ $situacion->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-12 md:col-span-6">
                        <span class="text-sm text-gray-800">Motivo Situación Revista</span>
                        <select wire:model="situacion_revista_motivos_id" name="revista" class="w-full h-10 rounded-lg border border-gray-200 focus:border-indigo-500">                            
                            @foreach($situacion_revistas_motivos as $motivos)
                                <option value="{{ $motivos->id }}" @if($motivos->id == $situacion_revista_motivos_id) selected @endif>{{ $motivos->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-span-12 md:col-span-6">
                        <x-datetime-picker  
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
                        <x-datetime-picker 
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
                            class="input-mask"
                            />
                    </div>

                    <div class="col-span-12 sm:col-span-4">
                        <span>Nacionalidad</span>
                        <select wire:model="nationalities_id" name="nacionalidad" class="w-full h-10 rounded-lg border border-gray-200 focus:border-indigo-500">                            
                            @foreach($nacionalidades as $nacionalidad)
                                <option value="{{ $nacionalidad->id }}" @if($nacionalidad->id == $nationalities_id) selected @endif>{{ $nacionalidad->pais }}</option>
                            @endforeach
                        </select>
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

                    <div class="col-span-12 md:col-span-5">
                        <x-select 
                            label="Localidad Domicilio Particular"
                            icon="globe-alt"
                            placeholder="Selecciona una localidad"
                            :async-data="route('api.localidades')"
                            option-label="location"
                            option-value="location"
                            wire:model="domicilio_particular_localidad"
                        />
                    </div>
                    {{-- <div class="col-span-12 md:col-span-5">
                        <span class="text-sm text-gray-800">Localidad Domicilio Particular</span>
                        {{$domicilio_particular_localidad}}
                        <select wire:model="domicilio_particular_localidad" name="revista" class="w-full h-10 rounded-lg border border-gray-200 focus:border-indigo-500">                            
                            @foreach($localidades as $localidad)
                                <option>{{ $localidad->location }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="col-span-12 md:col-span-5">
                        <x-select 
                            label="Municipio Domicilio Particular"
                            icon="globe-alt"
                            placeholder="Selecciona un municipio"
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

                    <div class="col-span-12 md:col-span-5">
                        <x-select
                            label="Localidad Domicilio Profesional"
                            icon="globe-alt"
                            placeholder="Selecciona una localidad"
                            :async-data="route('api.localidades')"
                            option-label="location"
                            option-value="location"
                            wire:model="domicilio_profesional_localidad"
                            />
                    </div>

                    <div class="col-span-12 md:col-span-5">
                        <x-select
                            label="Municipio Domicilio Profesional"
                            icon="globe-alt"
                            placeholder="Selecciona un municipio"
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
                        <x-datetime-picker 
                            label="Fecha Expedición Título"
                            wire:model.defer="fecha_expedicion_titulo" 
                            without-time="false"
                            placeholder="Seleccione fecha de expedición" 
                            />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-datetime-picker 
                            label="Fecha Ejercicio Desde"
                            wire:model.defer="fecha_ejercicio_desde" 
                            without-time="false"
                            placeholder="Seleccione fecha de ejercicio" 
                            />
                    </div>

                    <div class="col-span-12 md:col-span-4">
                        <x-datetime-picker 
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
                    <x-button wire:click="save" spinner="save" loading-delay="short" violet label="Actualizar matriculado" />
                </div>
                
            </form>
        </div>
    </div>

</div>