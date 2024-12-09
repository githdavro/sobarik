<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'jenis',
        'judul_sementara',
        'dosen_pembimbing',
        'notelp',
        'nama_instansi',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function jenisPengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jenis');
    }
}
