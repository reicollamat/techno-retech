<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> {{ $title ?? 'PR - TECH' }}</title>
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
        <nav class="navbar bg-light shadow-xl md:!px-36">
            <div class="container-fluid lg:!justify-between">
                <div class="flex items-center">
                    <a class="navbar-brand" href="/">
                        <div class="w-[130px] sm:w-[175px] h-auto">
                            <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="100%"
                                height="100%" class="d-inline-block align-text-top" />
                        </div>
                    </a>
                    <h class="tracking-tight text-center text-xl md:text-2xl">
                        {{ $page_header ?? 'PR-TECH' }}
                    </h>
                </div>
                @if (Auth::user())
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 flex items-center p-2 text-sm text-gray-600 gap-1">

                            <span class="mx-1">{{ Auth::user()->name ?? 'John Doe' }}</span>
                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="isOpen" @click.away="isOpen = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            class="absolute right-0 z-20 w-56 py-2 mt-2.5 overflow-hidden origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800 front">
                            <div
                                class="flex items-center p-1.5 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                                    src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                    alt="jane avatar">
                                <div class="mx-1">
                                    <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        {{ Auth::user()->name ?? 'John Doe' }}</h1>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ Auth::user()->email ?? 'john.doe@gmail.com' }}</p>
                                </div>
                            </div>
                            <a href="#"
                                class="block px-2 py-2.5 text-sm text-gray-600 capitalize no-underline transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                Help
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-start px-2 py-2 text-sm text-gray-600 capitalize no-underline transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    Sign Out
                                </button>
                            </form>

                        </div>
                    </div>
                @endif

            </div>
            {{--            <div class="container-fluid md:!justify-start !justify-center md:!px-36"> --}}

        </nav>
        @yield('content', $slot ?? '')

        {{--        @dd(Auth::user()) --}}

    </main>

    {{-- Footer --}}
    <footer>
        @include('layouts.footer')
    </footer>

    {{-- This directive is used to include the Livewire scripts --}}
    @livewireScriptConfig
    {{--    @livewireScripts --}}

    {{--  Livewire Alert  --}}
    <x-livewire-alert::scripts />

</body>

</html>
