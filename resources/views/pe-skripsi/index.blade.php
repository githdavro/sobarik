<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Pengajuan Skripsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-200">
                                {{ __('Pengajuan Skripsi') }}</h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">A list of all the
                                {{ __('Pengajuan Skripsi') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('pe-skripsis.create') }}"
                                class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="m-4 alert alert-success">
                            <p class="text-white">{{ $message }}</p>
                        </div>
                    @endif

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300 dark:divide-gray-600">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                No</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Nama Mahasiswa</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Nim</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Judul Sementara</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Dosen Pembimbing</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                File</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Jenis Skripsi</th>
                                            <th scope="col"
                                                class="px-3 py-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                                        @foreach ($peSkripsis as $peSkripsi)
                                            <tr class="dark:bg-gray-700">
                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-gray-200">
                                                    {{ $loop->iteration }}</td>
                                                <td
                                                    class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $peSkripsi->nama_mahasiswa }}</td>
                                                <td
                                                    class="px-3 py-4 text-sm whitespace-nowrap text-gray -500 dark:text-gray-400">
                                                    {{ $peSkripsi->nim }}</td>
                                                <td
                                                    class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $peSkripsi->judul_sementara }}</td>
                                                <td
                                                    class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $peSkripsi->dosen_pembimbing }}</td>
                                                <td
                                                    class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    @if ($peSkripsi->files->isEmpty())
                                                        <p class="text-gray-500 dark:text-gray-400">Tidak ada file</p>
                                                    @else
                                                        @foreach ($peSkripsi->files as $file)
                                                            <a href="{{ asset('storage/' . $file->file_path) }}"
                                                                target="_blank" class="text-blue-600 hover:underline">
                                                                {{ $file->file_name }}
                                                            </a>
                                                            <br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td
                                                    class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $peSkripsi->jenis_skripsi }}</td>

                                                <td
                                                    class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-gray-200">
                                                    <form action="{{ route('pe-skripsis.destroy', $peSkripsi->id) }}"
                                                        method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="font-bold text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-500"
                                                            onclick="return confirm('Are you sure to delete?')">{{ __('Delete') }}</button>
                                                        <a href="{{ route('pe-skripsis.show', $peSkripsi->id) }}"
                                                            class="mr-2 font-bold text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">{{ __('Show') }}</a>
                                                        @role('admin|dosen')
                                                            <a href="{{ route('pe-skripsis.edit', $peSkripsi->id) }}"
                                                                class="mr-2 font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-500">{{ __('Edit') }}</a>
                                                        @endrole
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="px-4 mt-4">
                                    {!! $peSkripsis->withQueryString()->links('vendor.pagination.tailwind') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
