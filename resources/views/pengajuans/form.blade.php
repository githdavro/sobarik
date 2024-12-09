<div class="space-y-4"> <!-- Use space-y-4 for vertical spacing -->
    <div class="p-4 bg-gray-800 rounded-md shadow">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
            {{ __('') }} {{ Auth::user()->name }}
        </h3>
    </div>

    <div>
        <x-input-label for="judul_sementara" :value="__('Judul Sementara')" />
        <x-text-input id="judul_sementara" name="judul_sementara" type="text" class="block mt-1 w-full" :value="old('judul_sementara', $pengajuan->judul_sementara ?? '')"
            placeholder="Judul Sementara" required />
        <x-input-error class="mt-2" :messages="$errors->get('judul_sementara')" />
    </div>

    <div>
        <x-input-label for="dosen_pembimbing" :value="__('Dosen Pembimbing')" />
        <x-text-input id="dosen_pembimbing" name="dosen_pembimbing" type="text" class="block mt-1 w-full"
            :value="old('dosen_pembimbing', $pengajuan->dosen_pembimbing ?? '')" placeholder="Dosen Pembimbing" required />
        <x-input-error class="mt-2" :messages="$errors->get('dosen_pembimbing')" />
    </div>

    <div>
        <x-input-label for="jenis_skripsi" :value="__('Jenis Skripsi')" />
        <x-select id="jenis_skripsi" name="jenis_skripsi" class="block mt-1 w-full" required>
            <option value="">Pilih Jenis Skripsi</option>
            @foreach ($jenisPengajuans as $jenis)
                <option value="{{ $jenis->id }}"
                    {{ old('jenis_skripsi', $pengajuan->jenis_skripsi ?? '') == $jenis->id ? 'selected' : '' }}>
                    {{ $jenis->nama }}
                </option>
            @endforeach
        </x-select>
        <x-input-error class="mt-2" :messages="$errors->get('jenis_skripsi')" />
    </div>

    <!-- Dynamic Files Section -->
    <div>
        <x-input-label for="files" :value="__('Files')" />
        <div id="file-inputs" class="space-y-2">
            <div class="file-input-item">
                <input type="file" name="files[]" class="block w-full">
            </div>
        </div>
        <button type="button" id="add-file" class="px-4 py-2 mt-2 text-white bg-blue-500 rounded hover:bg-blue-600">
            + Add File
        </button>
    </div>
</div>

<script>
    document.getElementById('add-file').addEventListener('click', function() {
        const container = document.getElementById('file-inputs');
        const newInput = document.createElement('div');
        newInput.classList.add('file-input-item', 'space-y-2');
        newInput.innerHTML = `
            <input type="file" name="files[]" class="block w-full">
            <button type="button" class="px-2 py-1 mt-2 text-white bg-red-500 rounded remove-file hover:bg-red-600">Remove</button>
        `;
        container.appendChild(newInput);

        // Add event listener for removing input
        newInput.querySelector('.remove-file').addEventListener('click', function() {
            container.removeChild(newInput);
        });
    });
</script>
