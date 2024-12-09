<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Bimbingan') }}
        </h2>
    </x-slot>
    <form action="{{ route('bimbingan.update', $bimbingan->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('bimbingan.form', ['bimbingan' => $bimbingan, 'submitLabel' => 'Update'])
    </form>
</x-app-layout>
