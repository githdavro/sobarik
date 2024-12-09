<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengajuan extends Model
{
    protected $fillable = ['jenis', 'reference_id'];

    public function skripsi()
    {
        return $this->belongsTo(PeSkripsi::class, 'reference_id');
    }

    public function magang()
    {
        return $this->belongsTo(PeMagang::class, 'reference_id');
    }
}