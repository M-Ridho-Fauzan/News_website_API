<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        {{ asset('css/default.css') }}
    @endif
</head>

<body class="font-sans antialiased dark:bg-gray-900 dark:text-white/50">
    <div class="relative z-10 max-w-full">
        @if (Route::has('login'))
            @auth
                @include('layouts.navigation')
            @else
                @include('layouts.navigation-unlogin')
            @endauth
        @endif
    </div>

    <div class=" bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px] max-h-screen"
            src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
    </div>


    @if (request('filter'))
        <input type="hidden" name="filter" value="{{ request('filter') }}">
    @elseif (request('search'))
        <input type="hidden" name="search" value="{{ request('search') }}">
    @elseif (request('search') && request('filter'))
        <input type="hidden" name="search" value="{{ request('search') }}">
        <input type="hidden" name="filter" value="{{ request('filter') }}">
    @endif

    @isset($header)
        <header class="relative bg-white shadow dark:bg-gray-800">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <form action="{{ route('all-post') }}" method="GET"
                    class="flex flex-col items-center justify-between w-full gap-6 lg:flex-row lg:gap-8">
                    {{ $header }}

                    <div class="w-full max-w-lg p-1">
                        <div class="flex flex-row w-full gap-2 ">
                            <x-text-input id="search" name="search" type="text" class="inline-block w-full px-2"
                                autofocus autocomplete="search" placeholder="{{ __('Cari apapun...') }}"
                                value="{{ request('search') }}" />
                            <x-primary-button id="saveButton" type="submit"
                                class="px-1">{{ __('Cari') }}</x-primary-button>
                            <x-input-error class="mt-2" :messages="$errors->get('search')" />
                        </div>
                    </div>

                    <div class="w-1/4 max-w-lg p-1">
                        <select name="filter" id="filter" onchange="this.form.submit()"
                            class="bg-gray-50 cursor-pointer focus:outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="all" selected>Kategori</option>
                            <option value="film">film</option>
                            <option value="sport">sports</option>
                        </select>
                        <button type="submit" class="hidden">Submit</button>
                    </div>
                </form>
            </div>
        </header>
    @endisset

    <div>
        {{ $slot }}
    </div>

    <footer class="pt-16 pb-8 text-sm text-center text-black dark:text-gray-500/70">
        <div>Build with <span class="text-pink-500 dark:text-pink-500/40">❤️</span> Make Laravel
            v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) &
            Tailwind v3.1.0
        </div>
        <div>
            <p class="text-xs">
                Copyright © 2024/2025 <span class="text-pink-500 dark:text-pink-500/40">❤️</span>WPU Unpas
            </p>
        </div>
    </footer>

    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
