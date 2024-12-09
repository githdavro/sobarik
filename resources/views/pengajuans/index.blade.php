<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-200">
                                {{ __('Daftar Pengajuan') }}</h1>
                            <p class="mt-2 text-sm text-gray-700 dark:text-gray-400">A list of all the
                                {{ __('Pengajuan') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('pengajuans.create') }}"
                                class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ __('Tambah Pengajuan') }}
                            </a>
                        </div>
                    </div>

                    <div class="flow-root mt-6">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                ID</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Mahasiswa</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Jenis</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Judul</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Dosen Pembimbing</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase dark:text-gray-400">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                                        @foreach ($pengajuans as $pengajuan)
                                            <tr class="dark:bg-gray-700">
                                                <td
                                                    class="px-3 py-4 text-sm font-medium text-gray-900 dark:text-gray-200">
                                                    {{ $pengajuan->id }}</td>
                                                <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $pengajuan->mahasiswa->name ?? '-' }}</td>
                                                <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $pengajuan->jenisPengajuan->nama ?? '-' }}</td>
                                                <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $pengajuan->judul_sementara }}</td>
                                                <td class="px-3 py-4 text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $pengajuan->dosen_pembimbing }}</td>
                                                <td
                                                    class="px-3 py-4 text-sm font-medium text-gray-900 dark:text-gray-200">
                                                    <a href="{{ route('pengajuans.show', $pengajuan->id) }}"
                                                        class="text-blue-600 hover:text -blue-900 dark:text-blue-400 dark:hover:text-blue-500">Detail</a>
                                                    <a href="{{ route('pengajuans.edit', $pengajuan->id) }}"
                                                        class="ml-2 text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-500">Edit</a>
                                                    <form action="{{ route('pengajuans.destroy', $pengajuan->id) }}"
                                                        method="POST" style="display:inline-block;" class="ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-500">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="px-4 py-3">
                                    {!! $pengajuans->links('vendor.pagination.tailwind') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
