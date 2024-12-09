<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeSkripsi
 *
 * @property $id
 * @property $nama_mahasiswa
 * @property $nim
 * @property $judul_sementara
 * @property $dosen_pembimbing
 * @property $file
 * @property $jenis_skripsi
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PeSkripsi extends Model
{


    protected $perPage = 20;

    protected $fillable = [
        'nama_mahasiswa', // Tambahkan atribut lain sesuai kebutuhan
        'nim',
        'judul_sementara',
        'dosen_pembimbing',
        'jenis_skripsi',
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function pengajuan()
    {
        return $this->morphOne(JenisPengajuan::class, 'reference');
    }
}
