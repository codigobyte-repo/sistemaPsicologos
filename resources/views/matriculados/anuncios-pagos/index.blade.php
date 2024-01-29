<x-app-layout>
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
                  <span class="ml-1 text-sm font-medium text-white md:ml-2 dark:text-white">Pago</span>
                </div>
              </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <ol class="flex justify-center mx-auto w-full space-y-4 sm:space-x-8 sm:space-y-0">

                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        1
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Subir comprobante</h3>
                        <p class="text-sm">En este paso envíanos el comprobante de pago</p>
                    </span>
                </li>

                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detalles del pago</h3>
                        <p class="text-sm">En este paso indicanos los detalles de lo que abonaste</p>
                    </span>
                </li>
            </ol>

            <div class="text-center mt-16">

                <form action="{{ route('cargar-comprobante') }}" 
                    method="POST"
                    enctype="multipart/form-data"
                    >

                    @csrf
                    @method('POST')

                    <x-validation-errors class="mb-4" />

                    <p class="flex items-center">
                        <div class="text-sm font-semibold text-gray-600">
                            <p>Puede subir múltiples imágenes o fotos</p>
                            <p>formatos permitidos: PDF/PNG/JPG/JPEG/GIF</p>
                        </div>
                    </p>

                    <div class="flex justify-center mx-auto mt-2">
                        <label class="bg-white px-6 py-4 rounded-lg inline-flex cursor-pointer">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            <span class="ml-2">CARGÁ TU COMPROBANTE AQUÍ</span>
                            
                            <input type="file" accept="image/*,application/pdf" name="comprobante[]" class="hidden" multiple onchange="previewFiles(event, '#imgPreviewContainer')">
                        </label>

                    </div>

                    <div class="flex justify-center mx-auto pt-8">
                        <div id="imgPreviewContainer" class="flex space-x-4"></div>
                    </div>
                    
                    <div class="flex justify-center mx-auto pt-8">
                        <button class="bg-purple-500 hover:bg-purple-700 text-white text-sm py-2 px-4 rounded">
                           Enviar comprobante
                        </button>
                    </div>  
                            
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function previewFiles(event, querySelector) {
            // Recuperamos el input que desencadenó la acción
            const input = event.target;
    
            // Recuperamos el contenedor donde cargaremos las imágenes
            const previewContainer = document.querySelector(querySelector);
    
            // Limpiamos el contenedor antes de agregar nuevas previsualizaciones
            previewContainer.innerHTML = '';
    
            // Verificamos si existen archivos seleccionados
            if (!input.files.length) return;
    
            // Recuperamos los archivos seleccionados
            const files = input.files;
    
            // Iteramos sobre los archivos seleccionados
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
    
                // Creamos la URL para la previsualización
                const objectURL = URL.createObjectURL(file);
    
                // Creamos un elemento div para contener cada previsualización
                const fileContainer = document.createElement('div');
                fileContainer.classList.add('text-center');
    
                // Creamos un elemento img o embed para la previsualización (imagen o PDF)
                const previewElement = file.type.startsWith('image/')
                    ? document.createElement('img')
                    : document.createElement('embed');
    
                previewElement.src = objectURL;
                previewElement.classList.add('max-w-full', 'max-h-64', 'my-2'); // Ajusta el tamaño y el margen según sea necesario
    
                // Añadimos el elemento de previsualización al contenedor
                fileContainer.appendChild(previewElement);
    
                // Creamos un elemento p para mostrar el nombre del archivo
                const fileNameElement = document.createElement('p');
                fileNameElement.textContent = file.name;
    
                // Añadimos el elemento del nombre del archivo al contenedor
                fileContainer.appendChild(fileNameElement);
    
                // Añadimos el contenedor al contenedor principal
                previewContainer.appendChild(fileContainer);
            }
        }
    </script>
    

</x-app-layout>