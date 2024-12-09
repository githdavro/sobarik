<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bimbingan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-200">
                            {{ __('Daftar Bimbingan') }}</h1>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">Daftar semua bimbingan yang tersedia.
                        </p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('bimbingan.create') }}"
                            class="block rounded-md bg-indigo-600 dark:bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah
                            Bimbingan</a>
                    </div>
                </div>

                <div class="flow-root mt-8">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            #</th>
                                        <th scope="col"
                                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Mahasiswa</th>
                                        <th scope="col"
                                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Dosen</th>
                                        <th scope="col"
                                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Judul</th>
                                        <th scope="col"
                                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-900 dark:divide-gray-700">
                                    @foreach ($bimbingans as $bimbingan)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 dark:text-gray-200">
                                                {{ $loop->iteration }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">
                                                {{ $bimbingan->mahasiswa->name }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">
                                                {{ $bimbingan->dosen->name }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">
                                                {{ $bimbingan->judul }}</td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-gray-200">
                                                <a href="{{ route('bimbingan.show', $bimbingan->id) }}"
                                                    class="text-gray-600 dark:text-gray-300 font-bold hover:text-gray-900 dark:hover:text-gray-100 mr-2">{{ __('Lihat') }}</a>
                                                <a href="{{ route('bimbingan.edit', $bimbingan->id) }}"
                                                    class="text-indigo-600 dark:text-indigo-400 font-bold hover:text-indigo-900 dark:hover:text-indigo-500 mr-2">{{ __('Edit') }}</a>
                                                <form action="{{ route('bimbingan.destroy', $bimbingan->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('bimbingan.destroy', $bimbingan->id) }}"
                                                        class="text-red-600 dark:text-red-400 font-bold hover:text-red-900 dark:hover:text-red-500"
                                                        onclick="event.preventDefault(); confirm('Apakah Anda yakin ingin menghapus?') ? this.closest('form').submit() : false;">{{ __('Hapus') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
