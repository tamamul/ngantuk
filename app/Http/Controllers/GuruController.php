<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    /**
     * Tampilkan semua guru
     */
    public function index()
    {
        $gurus = Guru::all();
        return view('admin.guru.index', compact('gurus'));
    }

    /**
     * Form tambah guru
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Simpan guru baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|unique:gurus,email',
            'nip'   => 'required|string|unique:gurus,nip',
            'mapel' => 'required|string|max:50',
        ]);

        Guru::create($request->all());

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan!');
    }

    /**
     * Form edit guru
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update data guru
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|unique:gurus,email,' . $id,
            'nip'   => 'required|string|unique:gurus,nip,' . $id,
            'mapel' => 'required|string|max:50',
        ]);

        $guru->update($request->all());

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    /**
     * Hapus guru
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus!');
    }
}