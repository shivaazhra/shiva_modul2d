<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar semua mahasiswa
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Menampilkan form tambah mahasiswa
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'        => 'required|unique:mahasiswas,nim',
            'nama'       => 'required|string|max:100',
            'kelas'      => 'required|string|max:100',
            'matakuliah' => 'required|string',
        ]);

        Mahasiswa::create([
            'nim'        => $request->nim,
            'nama'       => $request->nama,
            'kelas'      => $request->kelas,
            'matakuliah' => $request->matakuliah,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail mahasiswa (opsional)
     */
    public function show(string $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Menampilkan form edit mahasiswa
     */
    public function edit(string $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Memperbarui data mahasiswa
     */
    public function update(Request $request, string $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $request->validate([
            'nama'       => 'required|string|max:100',
            'kelas'      => 'required|string|max:100',
            'matakuliah' => 'required|string',
        ]);

        $mahasiswa->update([
            'nama'       => $request->nama,
            'kelas'      => $request->kelas,
            'matakuliah' => $request->matakuliah,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa
     */
    public function destroy(string $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
