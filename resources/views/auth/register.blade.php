<x-guest-layout>
    <div
        class="flex flex-col items-center max-h-screen min-h-screen pt-6 font-sans antialiased text-gray-800 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">

        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </div>

        <div
            class="w-full px-5 py-4 mt-6 bg-white/30 dark:shadow-md sm:max-w-xl dark:bg-gray-700/30 backdrop-blur-sm sm:rounded-lg">


            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Alamat Email ')" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="grid mt-4 sm:flex sm:justify-between sm:items-center">
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Kata Sandi')" />

                        <x-text-input id="password" class="flex justify-start w-full px-10 mt-1" type="password"
                            name="password" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Ketik Ulang Sandi')" />

                        <x-text-input id="password_confirmation" class="flex justify-start w-full px-10 mt-1"
                            type="password" name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>


                <div class="flex items-center justify-end my-4 mt-10">
                    <x-primary-button class="inline-flex items-center justify-center w-full">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>

                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <div class="flex items-center my-4">
                    <div class="flex-grow border-t dark:border-gray-700"></div>
                    <span class="px-4 text-gray-500">Atau</span>
                    <div class="flex-grow border-t dark:border-gray-700"></div>
                </div>

                <div class="grid flex-row items-center my-4">
                    {{-- Login with googlr --}}
                    <x-primary-link-btn href="{{ route('socialite.redirect', 'google') }}">
                        <x-icons.google-icon width="24" height="24" class="mr-2" />
                        {{ __('Register with google') }}
                    </x-primary-link-btn>

                    {{-- Login with github --}}
                    <x-primary-link-btn href="{{ route('socialite.redirect', 'github') }}">
                        <x-icons.github-icon width="24" height="24" class="mr-2" />
                        {{ __('Register with github') }}
                    </x-primary-link-btn>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
