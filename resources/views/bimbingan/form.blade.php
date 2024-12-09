<div class="space-y-6">
    <div>
        <x-input-label for="mahasiswa_id" :value="__('Mahasiswa')" />
        <select id="mahasiswa_id" name="mahasiswa_id" class="mt-1 block w-full">
            <option value="" disabled selected>-- Pilih Mahasiswa --</option>
            @foreach ($mahasiswas as $mahasiswa)
                <option value="{{ $mahasiswa->id }}"
                    {{ old('mahasiswa_id', $bimbingan?->mahasiswa_id) == $mahasiswa->id ? 'selected' : '' }}>
                    {{ $mahasiswa->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="dosen_id" :value="__('Dosen')" />
        <select id="dosen_id" name="dosen_id" class="mt-1 block w-full">
            <option value="" disabled selected>-- Pilih Dosen --</option>
            @foreach ($dosens as $dosen)
                <option value="{{ $dosen->id }}"
                    {{ old('dosen_id', $bimbingan?->dosen_id) == $dosen->id ? 'selected' : '' }}>
                    {{ $dosen->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="judul" :value="__('Judul')" />
        <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" :value="old('judul', $bimbingan?->judul)"
            placeholder="Judul" />
    </div>
    <x-primary-button>{{ $submitLabel ?? 'Submit' }}</x-primary-button>
</div>
