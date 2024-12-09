@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Pengajuan</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Mahasiswa:</strong> {{ $pengajuan->mahasiswa->name }}</p>
                <p><strong>Jenis Pengajuan:</strong> {{ $pengajuan->jenisPengajuan->name }}</p>
                <p><strong>Judul Sementara:</strong> {{ $pengajuan->judul_sementara }}</p>
                <p><strong>Dosen Pembimbing:</strong> {{ $pengajuan->dosen_pembimbing }}</p>
                <p><strong>No. Telepon:</strong> {{ $pengajuan->notelp }}</p>
                <p><strong>Nama Instansi:</strong> {{ $pengajuan->nama_instansi ?? '-' }}</p>
                <p><strong>Tanggal Mulai:</strong> {{ $pengajuan->tgl_mulai ?? '-' }}</p>
                <p><strong>Tanggal Selesai:</strong> {{ $pengajuan->tgl_selesai ?? '-' }}</p>
            </div>
        </div>
        <a href="{{ route('pengajuans.index') }}" class="mt-3 btn btn-secondary">Kembali</a>
    </div>
@endsection
