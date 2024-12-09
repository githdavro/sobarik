<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Pilihan untuk Mahasiswa atau Dosen -->
        <div class="mt-4">
            <x-input-label for="user_type" :value="__('Register as')" />
            <label for="mahasiswa" style="color: white;">
                <input type="radio" id="mahasiswa" name="user_type" value="mahasiswa" required />
                {{ __('Mahasiswa') }}
            </label>
            <label for="dosen" class="ml-4" style="color: white;">
                <input type="radio" id="dosen" name="user_type" value="dosen" required />
                {{ __('Dosen') }}
            </label>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        <!-- NIM -->
        <div class="mt-4" id="nim-field" style="display: none;">
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block w-full mt-1" type="text" name="nim" :value="old('nim')" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- NIP -->
        <div class="mt-4" id="nip-field" style="display: none;">
            <x-input-label for="nip" :value="__('NIP')" />
            <x-text-input id="nip" class="block w-full mt-1" type="text" name="nip" :value="old('nip')" />
            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.querySelectorAll('input[name="user_type"]').forEach((elem) => {
            elem.addEventListener('change', function() {
                document.getElementById('nim-field').style.display = this.value === 'mahasiswa' ? 'block' :
                    'none';
                document.getElementById('nip-field').style.display = this.value === 'dosen' ? 'block' :
                    'none';

                // Pastikan value dari input tetap dikirim hanya saat diperlukan
                if (this.value === 'dosen') {
                    document.getElementById('nip').required = true;
                    document.getElementById('nim').required = false;
                } else if (this.value === 'mahasiswa') {
                    document.getElementById('nim').required = true;
                    document.getElementById('nip').required = false;
                }
            });
        });
    </script>
</x-guest-layout>
