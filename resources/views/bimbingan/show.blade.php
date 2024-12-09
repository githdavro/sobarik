<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detail Bimbingan') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <div>
            <x-input-label for="mahasiswa" :value="__('Mahasiswa')" />
            <p class="mt-1">{{ $bimbingan->mahasiswa->name }}</p>
        </div>
        <div>
            <x-input-label for="dosen" :value="__('Dosen')" />
            <p class="mt-1">{{ $bimbingan->dosen->name }}</p>
        </div>
        <div>
            <x-input-label for="judul" :value="__('Judul')" />
            <p class="mt-1">{{ $bimbingan->judul }}</p>
        </div>
        <div>
            <x-input-label for="created_at" :value="__('Tanggal Dibuat')" />
            <p class="mt-1">{{ $bimbingan->created_at->format('d M Y') }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('bimbingan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
        </div>
    </div>
</x-app-layout>
