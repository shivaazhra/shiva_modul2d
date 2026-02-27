<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Matakuliah extends Model
{
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kode_mk', 'kode_mk');
    }
}