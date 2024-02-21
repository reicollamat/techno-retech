<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="PR-Tech, E-commerce" name="keywords">
    <meta content="PR-Tech is an E-commerce website that provides products for all your needs." name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        [x-cloak] {
            visibility: hidden !important;
            overflow: hidden !important;
            display: none !important;
        }
    </style>

    <!-- Favicon -->
    <link href="{{ asset('img/icon/retechicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- This directive is used to include the Livewire styles --}}
    @livewireStyles

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('multishop/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <main class="relative">
        {{--        <div class="absolute w-full h-full top-0 z-10"> --}}
        {{--            <div class="  w-full h-full opacity-50 z-10" style=""> --}}

        {{--            </div> --}}
        {{--            --}}{{--            <div class=" w-full opacity-90 h-1/2 z-10" style="background-color:#051937 "> --}}
        {{--            --}}{{--            </div> --}}
        {{--            --}}{{--            <div class="bg-blue-100 opacity-75  w-full h-1/2 z-10"> --}}
        {{--            --}}{{--            </div> --}}
        {{--        </div> --}}
        @yield('content', $slot ?? '')
    </main>

    {{-- Footer --}}
    <footer>
        @include('layouts.footer')
    </footer>

    {{-- This directive is used to include the Livewire scripts --}}
    @livewireScripts

</body>

</html>
