<x-guest-layout>

    <x-header title="{{ __('All Post') }}">
        <x-search-filter-form />
    </x-header>

    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 my-16 lg:max-w-7xl">
            <main>

                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 *:my-5">
                    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1 class="w-full grid-rows-none gap-6 text-5xl font-semibold text-black dark:text-white">
                                <i class="text-[#FF2D20] text-6xl">#</i>
                                <span>{{ $post['headline'] }}</span>
                            </h1>
                            <span class="py-10 text-lg font-medium text-gray-500">By {{ $post['byline'] }}</span>
                        </div>
                    </div>

                    {{-- <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex justify-center">
                                <img src="{{ $post['thumbnail'] }}" alt="No Post Available"
                                    class="w-full h-auto max-w-[800px] object-contain sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-2/3">
                            </div>

                            <div
                                class="flex *:bg-slate-500 *:px-3 mt-4 gap-2 *:rounded-lg *:py-2 lg:*:my-5 lg:*:m-0 flex-row justify-center">
                                <h3>{{ $post['section-name'] }}</h3>
                                <h3>{{ $post['type'] }}</h3>
                            </div>
                        </div>
                    </div> --}}

                    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex flex-col *:my-5 lg:*:m-0 lg:flex-row justify-between">
                                <article class="content-post *:my-5 w-full lg:w-3/4 lg:px-10 text-xl font-medium">
                                    {!! $post['stand-first'] !!}
                                    {!! $post['main'] !!}
                                    {!! $post['body'] !!}
                                </article>

                                <div class="flex flex-col w-full pt-5 lg:items-center lg:w-1/3">
                                    <h1
                                        class="flex flex-row px-4 mb-5 text-3xl font-semibold text-black lg:justify-end dark:text-white">
                                        <i class="text-[#FF2D20] text-3xl lg:text-7xl mr-4">#</i>
                                        <span>{{ __('Related Categories') }}</span>
                                    </h1>

                                    <x-kategori-in-post />

                                    <div class="flex mt-10">
                                        <i class="text-[#FF2D20] text-6xl">#</i>
                                        <div class="ml-7">
                                            <div class="text-3xl font-bold text-gray-800 dark:text-gray-200">
                                                {{ $post['publication'] }}</div>
                                            <div class="text-xl font-medium text-gray-500">{{ $post['last-modified'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 pb-10 text-gray-900 dark:text-gray-100">
                            <h1
                                class="flex flex-row items-center mb-5 text-3xl font-semibold text-black dark:text-white">
                                <i class="text-[#FF2D20] text-5xl mr-4">#</i>
                                <span>About The Author</span>
                            </h1>

                            <div class="flex flex-row items-center gap-5">
                                <div class="flex items-center gap-6">
                                    <div class="px-3 sm:px-1">
                                        <img class="w-48 border dark:brightness-50"
                                            src="{{ $post['author-image'] ?? asset('img/no-profile.png') }}"
                                            alt="{{ $post['author-name'] }}">
                                    </div>
                                </div>

                                <div class="flex flex-col w-full lg:w-2/3">
                                    <div class="px-3 sm:px-1">
                                        <div class="text-2xl font-medium text-gray-800 dark:text-gray-200">
                                            {{ $post['author-name'] }}</div>
                                        <div class="font-medium text-gray-500 text-1xl">{{ $post['author-tag'] }}</div>
                                    </div>
                                    <section class="text-lg font-medium">
                                        {!! $post['author-bio'] !!}
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </main>
        </div>
    </div>

    {{-- @dd($results) --}}
</x-guest-layout>
