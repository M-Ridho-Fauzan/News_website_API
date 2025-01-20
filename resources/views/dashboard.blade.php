{{-- <x-guest-layout> --}}
<x-app-layout>
    <x-header title="{{ __('Dashboard') }}">
        {{-- <x-search-filter-form /> --}}
        Lorem ipsum dolor sit amet.
    </x-header>

    <div class="relative py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col *:bg-slate-500 *:my-5 lg:*:m-0 lg:flex-row justify-between">
                        <h3>{{ __("Hello Admin, You're logged in!") }}</h3>
                        <h3>{{ __("Hello Admin, You're logged in!") }}</h3>
                        <h3>{{ __("Hello Admin, You're logged in!") }}</h3>
                    </div>
                </div>
            </div>

            <div class="mt-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Note:') }}
                    <ul>
                        <li>jumlah User login dengan form</li>
                        <li>jumlah User login dengan google</li>
                        <li>jumlah User login dengan github</li>
                        <li>jumlah akses user tanpa login</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    {{-- </x-guest-layout> --}}
</x-app-layout>
