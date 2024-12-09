<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jadwalmagang
 *
 * @property $id
 * @property $nama
 * @property $tanggal
 * @property $time
 * @property $location
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jadwalmagang extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama', 'tanggal', 'time', 'location', 'status'];


}
