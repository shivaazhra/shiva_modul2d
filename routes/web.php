<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\MatakuliahController;

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MatakuliahController::class);