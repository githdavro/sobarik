<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }} Pengajuan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ __('Create') }} Pengajuan
                </h2>
                <a href="{{ route('pengajuans.index') }}"
                    class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Kembali
                </a>
            </div>
            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">
                Silakan isi form di bawah untuk menambahkan pengajuan skripsi baru.
            </p>

            <form method="POST" action="{{ route('pengajuans.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Include form fields -->
                @include('pengajuans.form', [
                    'action' => route('pengajuans.store'),
                    'isEdit' => false,
                    'buttonText' => 'Create',
                    'pengajuan' => null, // No pengajuan for create
                    'mahasiswas' => $mahasiswas,
                    'jenisPengajuans' => $jenisPengajuans,
                ])

                <div class="flex items-center justify-start gap-4 mt-4">
                    <x-primary-button type="submit"
                        class="text-white bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
