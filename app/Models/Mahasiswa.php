<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'kode_mk' // pakai ini, bukan 'matakuliah'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    }
}