<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema de Psicología</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" href="{{asset('assets/images/logo-icon-16x16.png')}}" type="image/x-icon">

        {{-- WIEREUI --}}
        @wireUiScripts
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Hoja de estilos personaliza --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/estilos.css') }}">

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            @if (isset($headerTwo))
                <header class="bg-gradient-to-r from-purple-500 to-purple-900 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $headerTwo }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts


        @auth
            <script>
                window.onload=function () {
                    Echo.private('App.Models.User.' + {{ Auth::user()->id }})
                        .notification((notification) => {
                            Livewire.emit('notification');
                    });
                }
            </script>
        @endauth


    </body>
</html>
