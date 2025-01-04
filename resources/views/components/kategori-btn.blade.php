<!-- Settings Dropdown -->
<x-dropdown align="right" width="48" class="">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center py-5 font-medium leading-4 text-gray-500 transition duration-150 ease-in-out border-indigo-400 hover:border-b-2 group dark:text-gray-400 focus:outline-none">
            <x-nav-link class="border-none group-hover:text-gray-700 dark:group-hover:text-gray-300">
                {{ __('Kategori') }}
            </x-nav-link>
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
                <x-dropdown-link href="{{ buildQueryUrl('all-post', ['kategori' => $item['id_kategori']]) }}">
                    {{ $item['nama_kategori'] }}
                </x-dropdown-link>
            @endforeach
        @endif
        {{-- 
                Jika ada error $kategori undefined, maka masukan ini ke terminal:
                - php artisan view:clear
                - php artisan cache:clear
        --}}
    </x-slot>
</x-dropdown>
