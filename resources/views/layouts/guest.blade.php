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

    @isset($header)
        <header class="relative bg-white shadow dark:bg-gray-800">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <div>
        {{ $slot }}
    </div>

    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
