<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'pe_skripsi_id',
        'file_path',
        'file_name',
    ];

    public function peSkripsi()
    {
        return $this->belongsTo(PeSkripsi::class);
    }
}