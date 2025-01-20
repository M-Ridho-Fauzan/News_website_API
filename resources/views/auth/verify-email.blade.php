<x-guest-layout>
    <div
        class="flex flex-col items-center max-h-screen min-h-screen pt-6 font-sans antialiased text-gray-800 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">

        <div
            class="w-full flex flex-col items-center justify-center px-5 py-4 mt-6 bg-gray-300/30 dark:shadow-md sm:max-w-xl dark:bg-gray-700/30 backdrop-blur-sm sm:rounded-lg">

            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
            </div>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Thank you for signing up! Before editing, could you please verify your email address by clicking the link we just sent
                                                                                                                                                                                                                                                                                you? If you didn\'t receive that email, we\'d be happy to send you another one by clicking the button below.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex w-full items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="inline-flex items-center px-4 py-3 bg-red-400 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-700 focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
