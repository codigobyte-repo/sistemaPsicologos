<x-slot name="headerTwo">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
            <a href="{{ url('dashboard') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-blue-600 dark:text-white dark:hover:text-white">
                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                Panel
            </a>
            </li>
            <li aria-current="page">
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="ml-1 text-sm font-medium text-white md:ml-2 dark:text-white">mensajes recibidos</span>
            </div>
            </li>
        </ol>
    </nav>
</x-slot>

<div class="py-12">
    <div class="w-full mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            
            @if ($mensajes)

                <x-card title="Mensajes recibidos">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Mensaje de:
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Asunto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Mensaje
                                        </th>
                                        <th scope="col" class="px-6 py-3" width="10%">
                                            fecha del mensaje
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mensajes as $mensaje)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $mensaje->user->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $mensaje->subject }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-normal">
                                                @if(strlen($mensaje->body) > $mensajeTruncado && !$mensajesAmpliados[$mensaje->id])
                                                    <x-button class="mr-6" rounded info xs label="Ver más" wire:click="mostrarCompleto({{ $mensaje->id }})" /> {{ substr($mensaje->body, 0, $mensajeTruncado) }}
                                                @elseif($mensajesAmpliados[$mensaje->id])
                                                     {{ $mensaje->body }} <x-button class="ml-6" rounded info xs label="Ver menos" wire:click="mostrarTruncado({{ $mensaje->id }})" />
                                                @else
                                                    {{ $mensaje->body }}
                                                @endif
                                            </td>
                                            
                                            <td class="px-6 py-4">
                                                {{ ($mensaje->created_at)->format('d-m-Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </x-card>

            @else

                <div id="alert-border-1" class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        Por el momento no tiene mensajes recibidos
                    </div>
                </div>
                
            @endif

        </div>
    </div>
</div>



