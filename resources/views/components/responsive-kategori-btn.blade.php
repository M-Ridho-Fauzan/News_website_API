<!-- Settings Dropdown -->
@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block flex justify-end items-center w-full pe-4 py-2 border-l-4 border-indigo-400 dark:border-indigo-600 text-start text-base font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300 transition duration-150 ease-in-out'
            : 'block flex justify-end items-center w-full pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<x-dropdown align="left" width="100" class="w-full">
    <x-slot name="trigger">
        <button {{ $attributes->merge(['class' => $classes]) }}>
            <x-responsive-nav-link class="border-none group-hover:text-gray-700 dark:group-hover:text-gray-300">
                {{ __('Kategori') }}
            </x-responsive-nav-link>
            <div class="ms-1">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content" class="z-20">
        {{-- @dd($kategori) --}}
        @if ($kategori->isEmpty())
            <div class="p-4 text-gray-500">
                No categories available
            </div>
        @else
            @foreach ($kategori as $item)
                <x-responsive-nav-link href="{{ buildQueryUrl('all-post', ['kategori' => $item['id_kategori']]) }}">
                    {{ $item['nama_kategori'] }}
                </x-responsive-nav-link>
            @endforeach
        @endif
        {{-- 
                Jika ada error $kategori undefined, maka masukan ini ke terminal:
                - php artisan view:clear
                - php artisan cache:clear
        --}}
    </x-slot>
</x-dropdown>
