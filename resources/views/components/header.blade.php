@props(['title' => null])

<header class="relative w-full bg-white shadow dark:bg-gray-800">
    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-between w-full gap-6 lg:flex-row lg:gap-4">
            @if($title)
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $title }}
            </h2>
            @endif
    
            {{ $slot }}
        </div>
    </div>
</header>