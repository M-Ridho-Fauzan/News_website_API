<x-guest-layout>

    <x-header title="{{ __('All Post') }}">
        <x-search-filter-form />
    </x-header>

    @if (request('filter'))
        <input type="hidden" name="filter" value="{{ request('filter') }}">
    @elseif (request('search'))
        <input type="hidden" name="search" value="{{ request('search') }}">
    @elseif (request('search') && request('filter'))
        <input type="hidden" name="search" value="{{ request('search') }}">
        <input type="hidden" name="filter" value="{{ request('filter') }}">
    @endif

    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <main>
                <section class="grid gap-6 mt-10 lg:grid-cols-2 lg:gap-8">
                    @if ($posts->isEmpty())
                        <div class="p-4 text-gray-500">
                            No posts available
                        </div>
                    @else
                        @foreach ($posts as $rl)
                            <div
                                class="flex-row items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-5 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="relative flex py-3">
                                    <!-- Right Column (Content) -->
                                    <div class="flex-initial pt-0 pr-0 sm:pt-1 sm:pr-5">
                                        <div class="flex w-full text-sm font-medium">
                                            <small class="mt-3 text-gray-700"><i>{{ $rl['updated'] }}</i></small>
                                        </div>
                                        <h2 class="text-xl font-semibold text-black dark:text-white">
                                            <a href="{{ route('single-post', ['id' => $rl['id']]) }}"
                                                class="text-black dark:text-white hover:underline">
                                                {{ Str::limit(strip_tags($rl['webTitle']), 20) }}
                                            </a>
                                        </h2>
                                        <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                                            {!! $rl['desk'] !!}
                                        </p>
                                    </div>

                                    <!-- Left Column (Image) -->
                                    <div class="relative w-full h-0 pb-[30.25%] overflow-hidden rounded-lg">
                                        <img src="{{ $rl['thumbnail'] }}" alt="Post Thumbnail"
                                            class="absolute inset-0 object-cover w-full h-full">
                                    </div>
                                </div>
                                <div class="flex items-center justify-between w-full">
                                    {{-- <a
                                href="{{ route('your.route.name', ['authorId1' => $rl['authorId1'], 'authorId2' => $rl['authorId2']]) }}"
                                --}} <a href=""
                                        class="flex items-center gap-0 group sm:gap-3">
                                        <div
                                            class="flex size-9 overflow-hidden shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-10">
                                            <img class="size-9 sm:size-10 img-down" src="{{ $rl['authorImage'] }}"
                                                alt="">
                                        </div>
                                        <div class="px-3 sm:px-1">
                                            <div
                                                class="text-sm font-medium text-gray-800 group-hover:underline dark:text-gray-200">
                                                {{ $rl['authorName'] }}</div>
                                            <div class="text-xs font-medium text-gray-500">
                                                {{ $rl['authorTag'] }}
                                            </div>
                                        </div>
                                    </a>

                                    <ul
                                        class="flex flex-row gap-2 *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 *:text-xs sm:*:text-sm dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                        <a class=" hover:underline" href="{{ $rl['kategoriLink'] }}">
                                            {{ $rl['kategori'] }}
                                        </a>
                                        <a class=" hover:underline" href="{{ $rl['type'] }}">
                                            {{ $rl['type'] }}
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </section>

                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            </main>

        </div>
    </div>

</x-guest-layout>
