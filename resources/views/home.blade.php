<x-guest-layout>

    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">

        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

            <x-slot name="header">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ __('Home') }}
                </h2>
            </x-slot>

            <header class="grid items-center grid-cols-1 gap-2 py-10 lg:grid-cols-3">
                <div class="flex lg:justify-center lg:col-start-2">
                    {{-- <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                            fill="currentColor" />
                    </svg> --}}

                    <div class="flex-1 p-4 space-y-6 ">
                        <div class="flex flex-row gap-2">
                            <x-text-input id="search" name="search" type="text" class="block w-full p-2" autofocus
                                autocomplete="search" placeholder="{{ __('Cari apapun...') }}" />
                            <x-primary-button id="saveButton" class="px-1 ">{{ __('Cari') }}</x-primary-button>
                            <x-input-error class="mt-2" :messages="$errors->get('search')" />
                        </div>

                        {{-- Filter Dropdown --}}

                    </div>
            </header>

            <main class="mt-6">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <a href="{{ $posts[0]['id'] }}" id="docs-card"
                        class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white/ p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div id="screenshot-container" class="relative flex items-stretch flex-1 w-full">
                            <span
                                class="absolute z-10 mx-5 my-3 rounded-full border border-[#FF2D20] dark:bg-[#5f1511]/80 bg-[#fcafab] px-2 py-0.5  dark:text-[#FF2D20] dark:border-[#FF2D20]/15">{{
                                $posts[0]['type'] }}</span>
                            <img src="{{ $posts[0]['thumbnail'] }}" alt="{{ $posts[0]['webTitle'] }}"
                                class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        " />
                            <img src="{{ $posts[0]['thumbnail'] }}" alt="{{ $posts[0]['webTitle'] }}"
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
                                                src="{{ $posts[0]['authorImage'] }}" alt="">
                                        </div>
                                        <div class="px-3 sm:px-1">
                                            <div class="text-base font-medium text-gray-800 dark:text-gray-200">
                                                {{ $posts[0]['authorName'] }}</div>
                                            <div class="text-sm font-medium text-gray-500">{{ $posts[0]['authorTag'] }}
                                            </div>
                                        </div>
                                    </div>

                                    <ul
                                        class="flex flex-row gap-2 *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                        <li>
                                            {{ $posts[0]['kategori'] }}
                                        </li>
                                    </ul>
                                </div>

                                <div class="pt-3 sm:pt-5 lg:pt-0">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">
                                        {{ $posts[0]['webTitle'] }}</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        {{ $posts[0]['desk'] }}
                                    </p>

                                    <small class="mt-3 text-gray-700"><i>{{ $posts[0]['updated'] }}</i></small>
                                </div>
                            </div>

                            <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5">
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
                                    <small class="mt-3 text-gray-700"><i>{{ $posts[1]['updated'] }}</i></small>
                                </div>
                                <h2 class="text-xl font-semibold text-black dark:text-white">
                                    <a href="{{ route('single-post', ['id' => $posts[1]['id']]) }}"
                                        class="text-black dark:text-white hover:underline">
                                        {{ Str::limit(strip_tags($posts[1]['webTitle']), 20) }}
                                    </a>
                                </h2>
                                <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $posts[1]['desk'] }}
                                </p>
                            </div>

                            <!-- Left Column (Image) -->
                            <div class="flex-auto overflow-hidden rounded-lg">
                                <img src="{{ $posts[1]['thumbnail'] }}" alt="Post Thumbnail" class="w-full h-full">
                            </div>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            {{-- <a
                                href="{{ route('your.route.name', ['authorId1' => $posts[1]['authorId1'], 'authorId2' => $posts[1]['authorId2']]) }}"
                                --}} <a href="" class="flex items-center gap-0 group sm:gap-3">
                                <div
                                    class="flex size-9 overflow-hidden shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-10">
                                    <img class="size-9 sm:size-10 img-down" src="{{ $posts[1]['authorImage'] }}" alt="">
                                </div>
                                <div class="px-3 sm:px-1">
                                    <div
                                        class="text-sm font-medium text-gray-800 group-hover:underline dark:text-gray-200">
                                        {{ $posts[1]['authorName'] }}</div>
                                    <div class="text-xs font-medium text-gray-500">{{
                                        $posts[1]['authorTag'] }}
                                    </div>
                                </div>
                            </a>

                            <ul
                                class="flex flex-row gap-2 *:rounded-full *:border *:border-[#FF2D20] *:bg-[#FF2D20]/10 *:px-2 *:py-0.5 *:text-xs sm:*:text-sm dark:text-[#FF2D20] dark:*:border-[#FF2D20]/15">
                                <a href="{{ $posts[1]['kategoriLink'] }}">
                                    {{ $posts[1]['kategori'] }}
                                </a>
                                <li>
                                    {{ $posts[1]['type'] }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">

                        <!-- Left Column (Image) -->
                        <div class="flex-auto overflow-hidden rounded-lg">
                            <img src="{{ $posts[2]['thumbnail'] }}" alt="Post Thumbnail" class="w-full h-full">
                        </div>

                        <!-- Right Column (Content) -->
                        <div class="flex-initial pt-0 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">Vibrant Ecosystem</h2>
                            <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                                {{ $posts[2]['desk'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-16 text-sm text-center text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </div>
</x-guest-layout>