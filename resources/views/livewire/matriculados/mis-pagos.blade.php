<div>
    @if(isset($matriculado))

        <div class="mb-10">
            <div>
                <h1 class="text-gray-800 font-semibold text-2xl text-center mb-8">
                    Seleccionar los servicios abonados e informar los pagos correspondiente
                </h1>
            </div>            
                
            <x-card title="Selecciona los servicios abonados">
                <form wire:submit.prevent="datosDePagos" method="POST" enctype="multipart/form-data">
                
                    {{-- MATRICULA --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            
                            {{-- En la tabla tenemos los valores 1,2,3 representando A,B,C --}}
                            @if($matriculado->categoria == 1)

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div class="w-full text-lg font-semibold">Matrícula A: $ {{ number_format($matriculaA, 0, ',', '.') }} + FID $ {{ number_format($matriculaFid, 0, ',', '.') }} = $ {{ $resultadoMatriculaA }}.-</div>

                            @elseif ($matriculado->categoria == 2)
                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div class="w-full text-lg font-semibold">Matrícula B: $ {{ number_format($matriculaB, 0, ',', '.') }} + FID $ {{ number_format($matriculaFid, 0, ',', '.') }} = $ {{ $resultadoMatriculaB }}.-</div>

                            @elseif ($matriculado->categoria == 3)
                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>

                                <div class="w-full text-lg font-semibold">Matrícula C: $ {{ number_format($matriculaC, 0, ',', '.') }} + FID $ {{ number_format($matriculaFid, 0, ',', '.') }} = $ {{ $resultadoMatriculaC }}.-</div>
                            @endif
                        </div>

                        <div class="flex items-center m-8 pl-4 border border-gray-200 rounded hover:text-gray-600 hover:bg-gray-50">
                            <input wire:model="isCheckedMatricula" id="checkbox-matricula" type="checkbox" value="" name="checkbox-matricula" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-matricula" class="w-full py-4 ml-2 mr-4 text-sm font-medium text-gray-900 dark:text-gray-300">Seleccionar</label>
                        </div>
                        
                    </label>

                    {{-- MATRICULA ANTERIOR --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">                
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Matrícula Anterior</div>
                    
                            <input type="number" class="input-with-restrictions" wire:model="inputMatriculaAnterior" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>
                            
                            @error('inputMatriculaAnterior')
                              <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror

                        </div>
                    </label>

                    {{-- MULTA --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Multa, el valor de 5 UP $ {{ number_format($multa, 0, ',', '.') }}.-</div>
                        </div>

                        <div class="flex items-center m-8 pl-4 border border-gray-200 rounded hover:text-gray-600 hover:bg-gray-50">
                            <input wire:model="isCheckedMulta" id="multa-checkbox-2" type="checkbox" value="" name="multa-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="multa-checkbox-2" class="w-full py-4 ml-2 mr-4 text-sm font-medium text-gray-900 dark:text-gray-300">Seleccionar</label>
                        </div>
                    </label>

                    {{-- MULTA POR SUSPENSION --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Multa por suspensión</div>

                            <input type="number" class="input-with-restrictions" wire:model="inputMultaPorSuspension" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>

                            @error('inputMultaPorSuspension')
                              <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror

                        </div>
                    </label>

                    {{-- HABILITACIONES --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">                
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Habilitaciones, el valor de 2 UP $ {{ number_format($habilitaciones, 0, ',', '.') }}.-</div>
                            
                            {{-- Si el check está tildado ocultamos el input --}}
                            @if($isCheckedHabilitaciones == null )
                                <input type="number" class="input-with-restrictions" wire:model.lazy="inputHabilitaciones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                                <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe si ha abonado más de una habilitación.</p>

                                @error('inputHabilitaciones')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        {{-- Si el input tiene un valor ocultamos el check --}}
                        @if($inputHabilitaciones == null )
                            <div class="flex items-center m-8 pl-4 border border-gray-200 rounded hover:text-gray-600 hover:bg-gray-50">
                                <input wire:model="isCheckedHabilitaciones" id="habilitaciones-checkbox-2" type="checkbox" value="" name="habilitaciones-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="habilitaciones-checkbox-2" class="w-full py-4 ml-2 mr-4 text-sm font-medium text-gray-900 dark:text-gray-300">Seleccionar</label>
                            </div>
                        @endif
                    </label>

                    {{-- GASTO IOMA --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">                
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Gastos Ioma</div>

                            <input type="number" class="input-with-restrictions" wire:model="inputIoma" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:caret-blue-500 focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>

                            @error('inputIoma')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    {{-- SUPERVISIONES --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">                
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">
                                Supervisiones, importe de $ {{ number_format($importeSupervisiones, 0, ',', '.') }}.- + Supervisiones forenses: 20 UP $ {{ number_format($supervisiones_forenses, 0, ',', '.') }}.- = $ {{ number_format($importeSupervisiones, 0, ',', '.')  + number_format($supervisiones_forenses, 0, ',', '.') }}.-
                            </div>
                            {{--HASTA 5 AÑOS DE MATRICULACION:  9 UP ($ 3.942)
                            MAS DE 5 AÑOS DE MATRICULACION:  12 UP ($ 5.256)
                            SUPERVISIONES FORENSES: 20 UP ($ 8.760), CON UNA OPCION LIBRE POR SI SE EXTIENDE LA SUPERVISION. --}}
                            @if($isCheckedSupervisiones == null )    
                                <input type="number" class="input-with-restrictions" wire:model.lazy="inputSupervisiones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                                <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado si extiende la supervisión.</p>

                                @error('inputSupervisiones')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        {{-- Si el input tiene un valor ocultamos el check --}}
                        @if($inputSupervisiones == null )
                            <div class="flex items-center m-8 pl-4 border border-gray-200 rounded hover:text-gray-600 hover:bg-gray-50">
                                <input wire:model="isCheckedSupervisiones" id="supervisiones-checkbox-2" type="checkbox" value="" name="supervisiones-checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="supervisiones-checkbox-2" class="w-full py-4 ml-2 mr-4 text-sm font-medium text-gray-900 dark:text-gray-300">Seleccionar</label>
                            </div>
                        @endif

                    </label>

                    {{-- CURSOS --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">                
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Cursos</div>

                            <input type="number" class="input-with-restrictions" wire:model="inputCursos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>
                            
                            @error('inputCursos')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror

                        </div>
                    </label>

                    {{-- CARPETAS DE ESPECIALIDAD --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Carpetas de especialidad</div>

                            <input type="number" class="input-with-restrictions" wire:model="inputCarpetaEspecialidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>
                            
                            @error('inputCarpetaEspecialidad')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror

                        </div>
                    </label>

                    {{-- ESCUELAS --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Escuelas</div>

                            <input type="number" class="input-with-restrictions" wire:model="inputEscuelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>

                            @error('inputEscuelas')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    {{-- PAGOS A CUENTA --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Pagos a cuentas</div>

                            <input type="number" class="input-with-restrictions" wire:model="inputPagoACuentas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>

                            @error('inputPagoACuentas')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    {{-- OTROS PAGOS --}}
                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Otros pagos</div>

                            <input type="number" class="input-with-restrictions" wire:model="inputOtrosPagos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="text-sm text-blue-800">(Sólo números sin puntos separadores de miles, ejemplo: 3986)</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado.</p>

                            @error('inputOtrosPagos')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    <div class="mt-10 mb-6 font-semibold text-gray-700 text-lg">
                        Importe total: $ {{ number_format($importeTotal, 2, ",", ".") }}.-
                        <br>
                        <br>
                        @if($saldoFavor)
                            Saldo a favor: ${{ $saldoFavor }}.-
                        @elseif($saldoNegativo)
                            Saldo negativo:  <span class="text-red-600">- $ {{ $saldoNegativo }} .-</span>  
                        @elseif ($saldoMayor)
                        <span class="text-red-600 font-semibold">{{ $saldoMayor }}</span>
                        @endif
                    </div>

                    <label for="react-option" class="inline-flex items-center justify-between w-full p-5 mt-4 text-gray-500 bg-white border-2 border-gray-200 rounded-lg">
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div class="w-full text-lg font-semibold">Si el importe anterior no coincide con el importe que abonó, indique el importe a continuación</div>

                            <input type="text" wire:model="pagoEnviado" oninput="this.value = this.value.replace('.', ',').replace(/[^0-9,]/g, '')"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-48 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Importe">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Escriba el importe abonado, sin puntos ni separadores de miles.</p>

                            @error('pagoEnviado')
                                  <div class="text-xs text-red-500 font-semibold">{{ $message }}</div>
                            @enderror
                        </div>
                    </label>

                    <div class="mt-8">
                       <x-button wire:click="datosDePagos" spinner="datosDePagos" loading-delay="short" violet label="Enviar datos de pagos" />
                    </div>

                </form>
            </x-card>
        </div>

    @else

        <div id="sticky-banner" tabindex="-1" class="fixed top-50 left-0 z-50 flex justify-between w-full p-4 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="flex items-center mx-auto">
                <p class="flex items-center text-sm font-normal text-gray-500 dark:text-gray-400">
                    <span class="inline-flex p-1 mr-3 bg-gray-200 rounded-full dark:bg-gray-600 w-6 h-6 items-center justify-center">
                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                            <path d="M15 1.943v12.114a1 1 0 0 1-1.581.814L8 11V5l5.419-3.871A1 1 0 0 1 15 1.943ZM7 4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v5a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V4ZM4 17v-5h1v5H4ZM16 5.183v5.634a2.984 2.984 0 0 0 0-5.634Z"/>
                        </svg>
                        <span class="sr-only">Light bulb</span>
                    </span>
                    <span>Sección oculta, sólo para usuarios matriculados</span>
                </p>
            </div>
        </div>

    @endif

    <script>
        const inputs = document.querySelectorAll('.input-with-restrictions');
        inputs.forEach(input => {
            input.addEventListener('input', function(event) {
                formatInput(event);
            });
        });
    
        function formatInput(event) {
            const allowedCharacters = /[0-9,]/;
            const input = event.target.value;
            const lastChar = input.slice(-1);
    
            if (!allowedCharacters.test(lastChar)) {
                event.target.value = input.slice(0, -1);
            }
        }
    </script>

</div>
