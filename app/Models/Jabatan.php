<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    // The name of the table (optional if following conventions)
    protected $table = 'jabatans';

    // The attributes that are mass assignable
    protected $fillable = [
        'jabatan', // Field for jabatan name
    ];

    /**
     * Define the relationship with the Dosen model.
     * A jabatan can have many dosens.
     */
    public function dosens()
    {
        return $this->hasMany(Dosen::class, 'jabatan_id');
    }
}
