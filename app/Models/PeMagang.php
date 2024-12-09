<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeMagang
 *
 * @property $id
 * @property $nama_mahasiswa
 * @property $nim
 * @property $notelp
 * @property $nama_instansi
 * @property $tgl_mulai_kp
 * @property $tgl_selesai_kp
 * @property $file
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PeMagang extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama_mahasiswa', 'nim', 'notelp', 'nama_instansi', 'tgl_mulai_kp', 'tgl_selesai_kp', 'file'];


    public function pengajuan()
    {
        return $this->morphOne(JenisPengajuan::class, 'reference');
    }
}
