<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }} Pengajuan Magang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-200">{{ __('Create') }} Pengajuan Magang</h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">Add a new {{ __('Data') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('pe-magangs.index') }}" class="block rounded-md bg-indigo-600 dark:bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="max-w-xl py-2 align-middle ml-5">
                            <div class="max-w-xl py-2 align-middle">
                                <!-- Alpine.js Component -->
                                <form x-data="submitHandler" method="POST" action="{{ route('pe-magangs.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Include form fields here -->
                                    @include('pe-magang.form')

                                    <!-- Submit Button -->
                                    <div class="flex items-center justify-start gap-4 mt-4">
                                        <x-primary-button @click.prevent="show = true">Submit</x-primary-button>
                                    </div>

                                    <!-- Modal Popup -->
                                    <div x-show="show" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-sm w-full">
                                            <h2 class="text-xl font-bold mb-4 dark:text-gray-200">Konfirmasi</h2>
                                            <p class="dark:text-gray-400">Apakah Anda yakin ingin mengirim form ini? jika sudah di submit tidak bisa di ubah</p>
                                            <div class="mt-4 flex justify-end gap-4">
                                                <x-secondary-button @click="show = false">Batal</x-secondary-button>
                                                <x-primary-button @click="submitForm">Ya, Submit</x-primary-button>
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
    </div>

    <!-- Alpine.js Script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('submitHandler', () => ({
                show: false,
                submitForm() {
                    this.$el.submit();  // Submit form when "Ya, Submit" is clicked
                }
            }));
        });
    </script>
</x-app-layout>
