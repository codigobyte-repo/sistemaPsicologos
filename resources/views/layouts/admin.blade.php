<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema administrativo de Psicología</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" href="{{asset('assets/images/logo-icon-16x16.png')}}" type="image/x-icon">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        @livewire('navigation-menu-admin')

        <div class="min-h-screen bg-gray-950">
            
            <div class="flex bg-gray-100" x-data="{ isOpen: false }">
                
                <div class="w-16 bg-gray-950 p-1 shadow-lg transition-all ease-in-out duration-500 relative" :class="{ 'w-16': !isOpen }">
                    @livewire('admin.sidebar-collapsable')
                </div>
                

                <div class="flex-1 bg-gray-950 p-1 shadow-lg transition-all ease-in-out duration-500" style="width: calc(100% - 4rem);">

                    @if (isset($header))
                        <header class="bg-gray-800 rounded shadow mb-1">
                            <div class="w-full mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <div class="p-4 bg-gray-600 rounded">
                        {{$slot}}
                    </div>
                </div>
            </div>

        </div>

        @stack('modals')

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Evento livewire que enviamos de app/Http/Livewire/MatriculadosTable.php--}}
        <script>
            Livewire.on('error', function(message) {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
                })
            })
        </script>
    </body>
</html>
