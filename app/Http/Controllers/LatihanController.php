<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index() 
    {
        return view('welcome_mahasiswa', [
            'nama'        => 'Mahasiswa STMIK IKMI', // Tambahkan koma di sini
            'mata_kuliah' => ['Pemrograman Web', 'Struktur Data', 'Akuntansi']
        ]);
    }
}