<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">

    <div
        class="z-10 flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">
        <img id="background" class="absolute top-0 max-w-screen-lg max-h-screen -z-0 -left-20"
            src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />

        <div class="z-10 max-w-md sm:px-6">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current " />
            </a>
        </div>


        <div
            class="w-full px-5 py-4 mt-6 bg-white/30 dark:shadow-md sm:max-w-xl dark:bg-gray-800/30 backdrop-blur-sm sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>

</html>