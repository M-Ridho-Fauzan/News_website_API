<x-guest-layout>

    <x-header title="{{ __('Home') }}">
        <x-search-filter-form />
    </x-header>

    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">

        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

            <main class="mt-40 mb-28">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <a href="{{ route('single-post', ['id' => $trends[0]['id']]) }}" id="docs-card"
                        class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white/ p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div id="screenshot-container" class="relative flex items-stretch flex-1 w-full">

                            <img src="{{ $trends[0]['thumbnail'] }}" alt="{{ $trends[0]['webTitle'] }}"
                                class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        " />
                            <img src="{{ $trends[0]['thumbnail'] }}" alt="{{ $trends[0]['webTitle'] }}"
                                class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block" />
                            <div
                                class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900">
                            </div>
                        </div>

                        <div class="relative flex items-center gap-6 lg:items-end">
                            <div id="docs-card-content" class="flex flex-col items-start gap-6">
                                <div class="flex items-center justify-between w-full">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex size-12 overflow-hidden shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                            <img class="size-11 sm:size-16 img-down "
                                                src="{{ $trends[0]['authorImage'] }}" alt="">
                                        </div>
                                        <div class="px-3 sm:px-1">
                                            <div class="text-base font-medium text-gray-800 dark:text-gray-200">
                                                {{ $trends[0]['authorName'] }}</div>
                                            <div class="text-sm font-medium text-gray-500">
                                                {{ $trends[0]['authorTag'] }}
                                            </div>
                                        </div>
                                    </div>

                                    <ul
                                        class="flex flex-row gap-2 *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                        <li>
                                            {{ $trends[0]['kategori'] }}
                                        </li>
                                        <li>
                                            {{ $trends[0]['type'] }}
                                        </li>
                                    </ul>
                                </div>

                                <div class="pt-3 sm:pt-5 lg:pt-0">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">
                                        {{ $trends[0]['webTitle'] }}</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        {{ $trends[0]['desk'] }}
                                    </p>

                                    <small class="mt-3 text-gray-700"><i>{{ $trends[0]['updated'] }}</i></small>
                                </div>
                            </div>

                            <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </div>
                    </a>

                    <h1 class="text-5xl font-semibold text-black dark:text-white">
                        <i class="text-[#FF2D20] text-6xl">#</i>
                        <span>Trends</span>
                    </h1>

                    <div
                        class="flex-row items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-5 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div class="relative flex py-3">
                            <!-- Right Column (Content) -->
                            <div class="flex-initial pt-0 pr-0 sm:pt-1 sm:pr-5">
                                <div class="flex w-full text-sm font-medium">
                                    <small class="mt-3 text-gray-700"><i>{{ $trends[1]['updated'] }}</i></small>
                                </div>
                                <h2 class="text-xl font-semibold text-black dark:text-white">
                                    <a href="{{ route('single-post', ['id' => $trends[1]['id']]) }}"
                                        class="text-black dark:text-white hover:underline">
                                        {{ Str::limit(strip_tags($trends[1]['webTitle']), 20) }}
                                    </a>
                                </h2>
                                <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $trends[1]['desk'] }}
                                </p>
                            </div>

                            <!-- Left Column (Image) -->
                            <div class="relative w-full h-0 pb-[30.25%] overflow-hidden rounded-lg">
                                <img src="{{ $trends[1]['thumbnail'] }}" alt="Post Thumbnail"
                                    class="absolute inset-0 object-cover w-full h-full">
                            </div>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            {{-- <a
                                href="{{ route('your.route.name', ['authorId1' => $trends[1]['authorId1'], 'authorId2' => $trends[1]['authorId2']]) }}"
                                --}} <a href="" class="flex items-center gap-0 group sm:gap-3">
                                <div
                                    class="flex size-9 overflow-hidden shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-10">
                                    <img class="size-9 sm:size-10 img-down" src="{{ $trends[1]['authorImage'] }}"
                                        alt="">
                                </div>
                                <div class="px-3 sm:px-1">
                                    <div
                                        class="text-sm font-medium text-gray-800 group-hover:underline dark:text-gray-200">
                                        {{ $trends[1]['authorName'] }}</div>
                                    <div class="text-xs font-medium text-gray-500">{{ $trends[1]['authorTag'] }}
                                    </div>
                                </div>
                            </a>

                            <ul
                                class="flex flex-row gap-2 *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 *:text-xs sm:*:text-sm dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                <a class=" hover:underline" href="{{ $trends[1]['kategoriLink'] }}">
                                    {{ $trends[1]['kategori'] }}
                                </a>
                                <a class=" hover:underline" href="{{ $trends[1]['type'] }}">
                                    {{ $trends[1]['type'] }}
                                </a>
                            </ul>
                        </div>
                    </div>

                    {{-- === --}}

                    <div
                        class="flex-row items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-5 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div class="relative flex py-3">
                            <!-- Right Column (Content) -->
                            <div class="flex-initial pt-0 pr-0 sm:pt-1 sm:pr-5">
                                <div class="flex w-full text-sm font-medium">
                                    <small class="mt-3 text-gray-700"><i>{{ $trends[2]['updated'] }}</i></small>
                                </div>
                                <h2 class="text-xl font-semibold text-black dark:text-white">
                                    <a href="{{ route('single-post', ['id' => $trends[2]['id']]) }}"
                                        class="text-black dark:text-white hover:underline">
                                        {{ Str::limit(strip_tags($trends[2]['webTitle']), 20) }}
                                    </a>
                                </h2>
                                <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $trends[2]['desk'] }}
                                </p>
                            </div>

                            <!-- Left Column (Image) -->
                            <div class="relative w-full h-0 pb-[30.25%] overflow-hidden rounded-lg">
                                <img src="{{ $trends[2]['thumbnail'] }}" alt="Post Thumbnail"
                                    class="absolute inset-0 object-cover w-full h-full">
                            </div>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            {{-- <a
                                href="{{ route('your.route.name', ['authorId1' => $trends[2]['authorId1'], 'authorId2' => $trends[2]['authorId2']]) }}"
                                --}} <a href="" class="flex items-center gap-0 group sm:gap-3">
                                <div
                                    class="flex size-9 overflow-hidden shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-10">
                                    <img class="size-9 sm:size-10 img-down" src="{{ $trends[2]['authorImage'] }}"
                                        alt="">
                                </div>
                                <div class="px-3 sm:px-1">
                                    <div
                                        class="text-sm font-medium text-gray-800 group-hover:underline dark:text-gray-200">
                                        {{ $trends[2]['authorName'] }}</div>
                                    <div class="text-xs font-medium text-gray-500">{{ $trends[2]['authorTag'] }}
                                    </div>
                                </div>
                            </a>

                            <ul
                                class="flex flex-row gap-2 *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 *:text-xs sm:*:text-sm dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                <a class=" hover:underline" href="{{ $trends[2]['kategoriLink'] }}">
                                    {{ $trends[2]['kategori'] }}
                                </a>
                                <a class=" hover:underline" href="{{ $trends[2]['type'] }}">
                                    {{ $trends[2]['type'] }}
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>


                <h1 class="w-full grid-rows-none my-10 text-5xl font-semibold text-black dark:text-white">
                    <i class="text-[#FF2D20] text-6xl">#</i>
                    <span>Popular</span>
                </h1>

                <section class="grid gap-6 lg:grid-cols-1 lg:gap-8">

                    <div
                        class="flex-row items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-5 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div class="relative flex flex-row-reverse px-10 py-3">
                            <!-- Right Column (Content) -->
                            <div class="flex-initial pt-0 pr-0 sm:pt-1 sm:px-5">
                                <div class="py-8">
                                    <div class="flex w-full text-sm font-medium">
                                        <small class="mt-3 text-gray-700"><i>{{ $popular[0]['updated'] }}</i></small>
                                    </div>
                                    <h2 class="text-xl font-semibold text-black dark:text-white">
                                        <a href="{{ route('single-post', ['id' => $popular[0]['id']]) }}"
                                            class="text-black dark:text-white hover:underline">
                                            {{ Str::limit(strip_tags($popular[0]['webTitle']), 20) }}
                                        </a>
                                    </h2>
                                    <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $popular[0]['desk'] }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between w-full">
                                    {{-- <a
                                href="{{ route('your.route.name', ['authorId1' => $popular[0]['authorId1'], 'authorId2' => $popular[0]['authorId2']]) }}"
                                --}} <a href=""
                                        class="flex items-center gap-0 group sm:gap-3">
                                        <div
                                            class="flex size-9 overflow-hidden shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-10">
                                            <img class="size-9 sm:size-10 img-down"
                                                src="{{ $popular[0]['authorImage'] }}"
                                                alt="{{ $popular[0]['authorName'] }}">
                                        </div>
                                        <div class="px-3 sm:px-1">
                                            <div
                                                class="text-sm font-medium text-gray-800 group-hover:underline dark:text-gray-200">
                                                {{ $popular[0]['authorName'] }}</div>
                                            <div class="text-xs font-medium text-gray-500">
                                                {{ $popular[0]['authorTag'] }}
                                            </div>
                                        </div>
                                    </a>

                                    <ul
                                        class="flex flex-row gap-2 w-full h-max *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 *:text-xs sm:*:text-sm dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                        <a class=" hover:underline" href="{{ $popular[0]['kategoriLink'] }}">
                                            {{ $popular[0]['kategori'] }}
                                        </a>
                                        <a class=" hover:underline" href="{{ $popular[0]['type'] }}">
                                            {{ $popular[0]['type'] }}
                                        </a>
                                    </ul>
                                </div>
                            </div>

                            <!-- Left Column (Image) -->
                            <div class="relative w-full h-0 pb-[30.25%] pr-[30.25%] overflow-hidden rounded-lg">
                                <img src="{{ $popular[0]['thumbnail'] }}" alt="Post Thumbnail"
                                    class="absolute inset-0 object-cover w-full h-full">
                            </div>
                        </div>
                    </div>

                    {{-- === --}}

                    <div
                        class="flex-row items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-5 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div class="relative flex justify-between px-10 py-3">
                            <!-- Right Column (Content) -->
                            <div class="flex-initial pt-0 pr-0 sm:pt-1 sm:pr-5">
                                <div class="py-8">
                                    <div class="flex w-full text-sm font-medium">
                                        <small class="mt-3 text-gray-700"><i>{{ $popular[1]['updated'] }}</i></small>
                                    </div>
                                    <h2 class="text-xl font-semibold text-black dark:text-white">
                                        <a href="{{ route('single-post', ['id' => $popular[1]['id']]) }}"
                                            class="text-black dark:text-white hover:underline">
                                            {{ Str::limit(strip_tags($popular[1]['webTitle']), 20) }}
                                        </a>
                                    </h2>
                                    <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $popular[1]['desk'] }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between w-full px-10 ">
                                    {{-- <a
                                href="{{ route('your.route.name', ['authorId1' => $popular[1]['authorId1'], 'authorId2' => $popular[1]['authorId2']]) }}"
                                --}} <a href=""
                                        class="flex items-center gap-0 group sm:gap-3">
                                        <div
                                            class="flex size-9 overflow-hidden shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-10">
                                            <img class="size-9 sm:size-10 img-down"
                                                src="{{ $popular[1]['authorImage'] }}"
                                                alt="{{ $popular[1]['authorName'] }}">
                                        </div>
                                        <div class="px-3 sm:px-1">
                                            <div
                                                class="text-sm font-medium text-gray-800 group-hover:underline dark:text-gray-200">
                                                {{ $popular[1]['authorName'] }}</div>
                                            <div class="text-xs font-medium text-gray-500">
                                                {{ $popular[1]['authorTag'] }}
                                            </div>
                                        </div>
                                    </a>

                                    <ul
                                        class="flex flex-row gap-2 *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 *:text-xs sm:*:text-sm dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                        <a class=" hover:underline" href="{{ $popular[1]['kategoriLink'] }}">
                                            {{ $popular[1]['kategori'] }}
                                        </a>
                                        <a class=" hover:underline" href="{{ $popular[1]['type'] }}">
                                            {{ $popular[1]['type'] }}
                                        </a>
                                    </ul>
                                </div>
                            </div>

                            <!-- Left Column (Image) -->
                            <div class="relative w-full h-0 pb-[30.25%] overflow-hidden rounded-lg">
                                <img src="{{ $popular[1]['thumbnail'] }}" alt="Post Thumbnail"
                                    class="absolute inset-0 object-cover w-full h-full">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center w-full mt-7">
                        <div class="flex-grow hidden h-px dark:flex dark:bg-[#FF2D20]/15"></div>
                        <a href="{{ route('all-post') }}" id="porto-details-btn"
                            class="h-8 m-auto py-1 dark:hover:bg-[#FF2D20]/10 hover:bg-[#FF2D20]/10 bg-[#FF2D20]/15 border hover:border-[#FF2D20] text-[#FF2D20] text-center transition duration-300 rounded-full animate-bounce dark:animate-none w-96 text-xs sm:text-sm dark:text-[#FF2D20] dark:border-[#FF2D20]/15"">
                            Show more &#9662;
                            {{-- Dengan request popular --}}
                        </a>
                        <div class="flex-grow hidden h-px dark:flex bg-[#FF2D20]/15"></div>
                    </div>
                </section>

                <h1 class="w-full grid-rows-none my-10 text-5xl font-semibold text-black dark:text-white">
                    <i class="text-[#FF2D20] text-6xl">#</i>
                    <span>Related</span>
                </h1>

                <section class="grid gap-6 lg:grid-cols-2 lg:gap-8">
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
            </main>
        </div>
    </div>
</x-guest-layout>
