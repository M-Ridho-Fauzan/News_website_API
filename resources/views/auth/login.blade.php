<x-guest-layout>

    <div
        class="flex flex-col items-center max-h-screen min-h-screen pt-6 font-sans antialiased text-gray-800 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">

        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </div>

        <div
            class="w-full px-5 py-4 mt-6 bg-gray-300/30 dark:shadow-md sm:max-w-xl dark:bg-gray-700/30 backdrop-blur-sm sm:rounded-lg">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex justify-between mt-4 ">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>

                    <div class="inline-flex items-center mx-2">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md ms-2 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-end my-4">
                    <x-primary-button class="inline-flex items-center justify-center w-full">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

                <div class="flex justify-start my-4 text-sm text-gray-600 dark:text-gray-400">
                    <a href="{{ route('register') }}"
                        class="underline rounded-md ms-2 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Belum punya akun?') }}
                    </a>
                </div>

                <div class="flex items-center my-4">
                    <div class="flex-grow border-t dark:border-gray-700"></div>
                    <span class="px-4 text-gray-500">Atau</span>
                    <div class="flex-grow border-t dark:border-gray-700"></div>
                </div>

                <div class="grid flex-row items-center my-4">
                    {{-- Login with googlr --}}
                    <x-primary-link-btn href="{{ route('socialite.redirect', 'google') }}">
                        <x-icons.google-icon width="24" height="24" class="mr-2" />
                        {{ __('Login with google') }}
                    </x-primary-link-btn>

                    {{-- Login with github --}}
                    <x-primary-link-btn href="{{ route('socialite.redirect', 'github') }}">
                        <x-icons.github-icon width="24" height="24" class="mr-2 dark:fill-black fill-gray-300" />
                        {{ __('Login with github') }}
                    </x-primary-link-btn>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
