<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css')}}">
        <link href="{{ asset('assetes/css/styles.css')}}" rel="stylesheet" />

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('assetes/js/scripts.js')}}"></script>
        <script src="{{ asset('assetes/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assetes/demo/chart-bar-demo.js')}}"></script>
        <script src="{{ asset('assetes/js/datatables-simple-demo.js')}}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.js')}}"></script>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
    @include('sweetalert::alert')
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

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        
    </body>
    <script>
            var rdiv=document.querySelector('#matricula');
                rdiv.style.display="none";
        </script>
</html>
