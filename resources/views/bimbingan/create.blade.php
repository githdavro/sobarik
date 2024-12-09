<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tambah Bimbingan') }}
        </h2>
    </x-slot>
    <form action="{{ route('bimbingan.store') }}" method="POST">
        @csrf
        @include('bimbingan.form', ['bimbingan' => null, 'submitLabel' => 'Tambah'])
    </form>
</x-app-layout>
