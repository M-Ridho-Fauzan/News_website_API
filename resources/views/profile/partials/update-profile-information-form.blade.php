<section>
    <header class="py-6 border-b dark:border-gray-600">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex flex-col space-y-6 md:flex-row-reverse md:space-y-0 md:space-x-6">
            <!-- Bagian Kanan: Upload Foto Profil -->
            <div class="flex-1 p-6 sm:border-b-2 sm:border-gray-200 dark:sm:border-gray-600">
                <!-- Label untuk Foto Profil -->
                <x-input-label for="user_img" :value="__('Foto Profil')" class="mb-2 ml-2" />

                <div class="flex justify-center w-full">
                    <div class="relative p-2 overflow-hidden bg-white rounded-full shadow-md w-fit dark:bg-gray-400">
                        <!-- Gambar Profil -->
                        <img id="preview" class="profile-img" width="250" height="250"
                            src="{{ Auth::user()->user_img ? Auth::user()->user_img : asset('img/no-profile.png') }}"
                            alt="{{ Auth::user()->name }}"
                            onerror="this.onerror=null;this.src='{{ asset('img/no-profile.png') }}';">

                        <!-- Overlay untuk Input File -->
                        <div
                            class="absolute inset-0 flex items-center justify-center transition-all rounded-full opacity-0 bg-black/50 hover:opacity-100">
                            <x-icons.file-icon class="w-12 h-12 fill-white" />
                            <input type="file" name="user_img" id="user_img"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                onchange="previewImage(event)">
                        </div>
                    </div>
                </div>

                <!-- Tombol batal -->
                <button id="cancel-button-img" onclick="resetImageSelection()" type="button"
                    class="hidden px-4 py-2 ml-2 text-white transition bg-gray-500 rounded-md hover:bg-gray-600">
                    Batalkan
                </button>

                <div id="message-img" class="mt-2"></div>

                <x-input-error class="mt-2" :messages="$errors->get('user_img')" />
                <!-- Nama File Terpilih -->
                <p id="file-name" class="mt-2 text-sm text-center text-gray-500"></p>
            </div>

            <!-- Bagian Kiri: Input Name dan Email -->
            <div class="flex-1 p-6 space-y-6">
                <!-- Input Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <!-- Input Email -->
                <div class="mt-6">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="block w-full mt-1"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    <!-- Verifikasi Email -->
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div class="mt-4">
                            <p class="text-sm text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- Tombol Simpan -->
                <div class="flex justify-center gap-4 pt-8">
                    <x-primary-button id="saveButton" class="px-20" disabled>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </form>

</section>
