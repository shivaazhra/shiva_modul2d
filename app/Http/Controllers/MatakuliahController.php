<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah; 
use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'kode_mk' => 'required|unique:matakuliahs,kode_mk',
        'nama_mk' => 'required',
        'sks' => 'required|integer|min:1|max:6',
        'semester' => 'required|integer|min:1|max:8',
    ]);

    Matakuliah::create($validated);

    return redirect()->route('matakuliah.index')
        ->with('success', 'Data berhasil ditambahkan');
}
    public function edit($kode_mk)
{
    $matakuliah = Matakuliah::findOrFail($kode_mk);
    return view('matakuliah.edit', compact('matakuliah'));
}
    public function update(Request $request, $kode_mk)
{
    $validated = $request->validate([
        'nama_mk' => 'required',
        'sks' => 'required|integer|min:1|max:6',
        'semester' => 'required|integer|min:1|max:8',
    ]);

    $matakuliah = Matakuliah::findOrFail($kode_mk);
    $matakuliah->update($validated);

    return redirect()->route('matakuliah.index')
        ->with('success', 'Data berhasil diperbarui');
}
    public function destroy($kode_mk)
{
    $matakuliah = Matakuliah::findOrFail($kode_mk);
    $matakuliah->delete();

    return redirect()->route('matakuliah.index')
        ->with('success', 'Data berhasil dihapus');
}
}