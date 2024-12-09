<div class="space-y-4"> <!-- Use space-y-4 for vertical spacing -->
    <div>
        <x-input-label for="nama_mahasiswa" :value="__('Nama Mahasiswa')" />
        <x-text-input id="nama_mahasiswa" name="nama_mahasiswa" type="text" class="block mt-1 w-100"
            style="width: 100%; max-width: 600px;" :value="old('nama_mahasiswa', $peSkripsi?->nama_mahasiswa)" placeholder="Nama Mahasiswa" />
        <x-input-error class="mt-2" :messages="$errors->get('nama_mahasiswa')" />
    </div>
    <div>
        <x-input-label for="nim" :value="__('NIM')" />
        <x-text-input id="nim" name="nim" type="text" class="block mt-1 w-100"
            style="width: 100%; max-width: 600px;" :value="old('nim', $peSkripsi?->nim)" placeholder="NIM" />
        <x-input-error class="mt-2" :messages="$errors->get('nim')" />
    </div>
    <div>
        <x-input-label for="judul_sementara" :value="__('Judul Sementara')" />
        <x-text-input id="judul_sementara" name="judul_sementara" type="text" class="block mt-1 w-100"
            style="width: 100%; max-width: 600px;" :value="old('judul_sementara', $peSkripsi?->judul_sementara)" placeholder="Judul Sementara" />
        <x-input-error class="mt-2" :messages="$errors->get('judul_sementara')" />
    </div>
    <div>
        <x-input-label for="dosen_pembimbing" :value="__('Dosen Pembimbing')" />
        <x-text-input id="dosen_pembimbing" name="dosen_pembimbing" type="text" class="block mt-1 w-100"
            style="width: 100%; max-width: 600px;" :value="old('dosen_pembimbing', $peSkripsi?->dosen_pembimbing)" placeholder="Dosen Pembimbing" />
        <x-input-error class="mt-2" :messages="$errors->get('dosen_pembimbing')" />
    </div>
    <!-- Dynamic Files Section -->
    <div>
        <x-input-label for="files" :value="__('Files')" />
        <div id="file-inputs" class="space-y-2">
            <!-- Initial Input -->
            <div class="file-input-item">
                <input type="file" name="files[]" class="block w-full">
            </div>
        </div>
        <button type="button" id="add-file" class="px-4 py-2 mt-2 text-white bg-blue-500 rounded">
            + Add File
        </button>
    </div>
</div>
<div>
    <x-input-label for="jenis_skripsi" :value="__('Jenis Skripsi')" />
    <x-text-input id="jenis_skripsi" name="jenis_skripsi" type="text" class="block mt-1 w-100"
        style="width: 100%; max-width: 600px;" :value="old('jenis_skripsi', $peSkripsi?->jenis_skripsi)" placeholder="Jenis Skripsi" />
    <x-input-error class="mt-2" :messages="$errors->get('jenis_skripsi')" />
</div>
</div>

<script>
    document.getElementById('add-file').addEventListener('click', function() {
        const container = document.getElementById('file-inputs');
        const newInput = document.createElement('div');
        newInput.classList.add('file-input-item', 'space-y-2');
        newInput.innerHTML = `
            <input type="file" name="files[]" class="block w-full">
            <button type="button" class="px-2 py-1 mt-2 text-white bg-red-500 rounded remove-file">Remove</button>
        `;
        container.appendChild(newInput);

        // Add event listener for removing input
        newInput.querySelector('.remove-file').addEventListener('click', function() {
            container.removeChild(newInput);
        });
    });
</script>
