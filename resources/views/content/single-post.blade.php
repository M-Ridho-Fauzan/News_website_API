<x-guest-layout>

    <x-header title="{{ __('All Post') }}">
        <x-search-filter-form />
    </x-header>

    @dd($results)
    {{-- {{ $results }} --}}



</x-guest-layout>
