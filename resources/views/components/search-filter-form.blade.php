@props([
'action' => route('all-post'),
'method' => 'GET',
'searchPlaceholder' => __('Cari apapun...'),
'showFilter' => true,
'filterOptions' => [
'all' => 'Kategori',
'film' => 'Film',
'sport' => 'Sports'
]
])

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes->merge(['class' => 'flex flex-col items-center justify-between lg:w-3/4 w-full gap-6 lg:flex-row lg:gap-8']) }}>
    <div class="w-full max-w-lg p-1">
        <div class="flex flex-row w-full gap-2">
            <x-text-input id="search" name="search" type="text" class="w-full" :placeholder="$searchPlaceholder"
                :value="request('search')" />
            <x-primary-button type="submit">{{ __('Cari') }}</x-primary-button>
        </div>
    </div>

    @if($showFilter)
    <div class="w-full lg:w-1/4">
        <select name="filter" id="filter" onchange="this.form.submit()"
            class="bg-gray-50 cursor-pointer focus:outline-none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach($filterOptions as $value => $label)
            <option value="{{ $value }}" @if(request('filter')==$value) selected @endif>
                {{ $label }}
            </option>
            @endforeach
        </select>
    </div>
    @endif

    {{ $slot }}
</form>