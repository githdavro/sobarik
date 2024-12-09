<div class="space-y-6">
    
    <div>
        <x-input-label for="nama" :value="__('Nama')"/>
        <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama', $jadwalmagang?->nama)" autocomplete="nama" placeholder="Nama"/>
        <x-input-error class="mt-2" :messages="$errors->get('nama')"/>
    </div>
    <div>
        <x-input-label for="tanggal" :value="__('Tanggal')"/>
        <x-text-input id="tanggal" name="tanggal" type="date" class="mt-1 block w-full" :value="old('tanggal', $jadwalmagang?->tanggal)" autocomplete="tanggal" placeholder="Tanggal"/>
        <x-input-error class="mt-2" :messages="$errors->get('tanggal')"/>
    </div>
    <div>
        <x-input-label for="time" :value="__('Time')"/>
        <x-text-input id="time" name="time" type="time" class="mt-1 block w-full" :value="old('time', $jadwalmagang?->time)" autocomplete="time" placeholder="Time"/>
        <x-input-error class="mt-2" :messages="$errors->get('time')"/>
    </div>
    <div>
        <x-input-label for="location" :value="__('Location')"/>
        <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $jadwalmagang?->location)" autocomplete="location" placeholder="Location"/>
        <x-input-error class="mt-2" :messages="$errors->get('location')"/>
    </div>
    <div>
        <x-input-label for="status" :value="__('Status')"/>
        <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="old('status', $jadwalmagang?->status)" autocomplete="status" placeholder="Status"/>
        <x-input-error class="mt-2" :messages="$errors->get('status')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>