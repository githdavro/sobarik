<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ show: false }">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-200">
                                Edit Data Pengajuan Skripsi
                            </h1>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('pengajuans.index') }}"
                                class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Back
                            </a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="max-w-xl py-2 ml-5 align-middle">
                            <form method="POST" action="{{ route('pengajuans.update', $pengajuan) }}"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <!-- Include Form Fields -->
                                @include('pengajuans.form', [
                                    'action' => route('pengajuans.update', $pengajuan),
                                    'isEdit' => true,
                                    'buttonText' => 'Update',
                                    'pengajuan' => $pengajuan,
                                    'mahasiswas' => $mahasiswas,
                                    'jenisPengajuans' => $jenisPengajuans,
                                ])

                                <!-- Submit Button -->
                                <div class="flex items-center justify-start gap-4 mt-4">
                                    <x-primary-button @click.prevent="show = true">Submit</x-primary-button>
                                </div>

                                <!-- Modal Popup -->
                                <div x-show="show" @click.away="show = false" style="display: none;"
                                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                                        <h2 class="mb-4 text-xl font-bold dark:text-gray-200">Konfirmasi</h2>
                                        <p class="dark:text-gray-400">Apakah Anda yakin ingin menyimpan perubahan?</p>
                                        <div class="flex justify-end gap-4 mt-4">
                                            <x-secondary-button @click="show = false">Batal</x-secondary-button>
                                            <x-primary-button @click="submitForm">Ya, Simpan</x-primary-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('submitHandler', () => ({
                show: false,
                submitForm() {
                    this.show = false; // Hide the modal
                    this.$el.closest('form').submit(); // Submit the form when confirmed
                }
            }));
        });
    </script>
</x-app-layout>
