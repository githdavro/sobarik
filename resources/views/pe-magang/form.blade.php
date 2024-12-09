<div class="space-y-6">
    
    <div>
        <x-input-label for="nama_mahasiswa" :value="__('Nama Mahasiswa')"/>
        <x-text-input id="nama_mahasiswa" name="nama_mahasiswa" type="text" class="mt-1 block w-full" :value="old('nama_mahasiswa', $peMagang?->nama_mahasiswa)" autocomplete="nama_mahasiswa" placeholder="Nama Mahasiswa"/>
        <x-input-error class="mt-2" :messages="$errors->get('nama_mahasiswa')"/>
    </div>
    
    <div>
        <x-input-label for="nim" :value="__('Nim')"/>
        <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" :value="old('nim', $peMagang?->nim)" autocomplete="nim" placeholder="Nim" />
        <x-input-error class="mt-2" :messages="$errors->get('nim')"/>
    </div>
    
    <div>
        <x-input-label for="notelp" :value="__('Notelp')"/>
        <x-text-input id="notelp" name="notelp" type="text" class="mt-1 block w-full" :value="old('notelp', $peMagang?->notelp)" autocomplete="notelp" placeholder="Notelp" />
        <x-input-error class="mt-2" :messages="$errors->get('notelp')"/>
    </div>
    
    <div>
        <x-input-label for="nama_instansi" :value="__('Nama Instansi')"/>
        <x-text-input id="nama_instansi" name="nama_instansi" type="text" class="mt-1 block w-full" :value="old('nama_instansi', $peMagang?->nama_instansi)" autocomplete="nama_instansi" placeholder="Nama Instansi"/>
        <x-input-error class="mt-2" :messages="$errors->get('nama_instansi')"/>
    </div>
    
    <div>
        <x-input-label for="tgl_mulai_kp" :value="__('Tgl Mulai Kp')"/>
        <x-text-input id="tgl_mulai_kp" name="tgl_mulai_kp" type="date" class="mt-1 block w-full" :value="old('tgl_mulai_kp', $peMagang?->tgl_mulai_kp)" autocomplete="tgl_mulai_kp"/>
        <x-input-error class="mt-2" :messages="$errors->get('tgl_mulai_kp')"/>
    </div>
    
    <div>
        <x-input-label for="tgl_selesai_kp" :value="__('Tgl Selesai Kp')"/>
        <x-text-input id="tgl_selesai_kp" name="tgl_selesai_kp" type="date" class="mt-1 block w-full" :value="old('tgl_selesai_kp', $peMagang?->tgl_selesai_kp)" autocomplete="tgl_selesai_kp"/>
        <x-input-error class="mt-2" :messages="$errors->get('tgl_selesai_kp')"/>
    </div>
    
    <div>
        <x-input-label for="file" :value="__('File')"/>
        <x-text-input id="file" name="file" type="file" class="mt-1 block w-full" :value="old('file', $peMagang?->file)" autocomplete="file"/>
        <x-input-error class="mt-2" :messages="$errors->get('file')"/>
    </div>

    <!-- <div>
        <x-input-label for="validasi_selesai" :value="__('Validasi data yang sudah di upload tidak bisa di edit')" />
        <input id="validasi_selesai" name="validasi_selesai" type="checkbox" class="mt-1 block" value="1" {{ old('validasi_selesai', $peMagang?->validasi_selesai) ? 'checked' : '' }} />
        <x-input-error class="mt-2" :messages="$errors->get('validasi_selesai')" />
    </div> -->
        
</div>
