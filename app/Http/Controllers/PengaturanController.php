<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    /**
     * Menampilkan form pengaturan.
     */
    public function index()
    {
        // Ambil record pertama dari tabel pengaturans
        $pengaturan = Pengaturan::first();

        return view('admin.pengaturan', compact('pengaturan'));
    }

    /**
     * Update pengaturan lokasi dan radius.
     */
    public function update(Request $request)
    {
        $request->validate([
            'lat_kantor' => 'required|numeric',
            'lng_kantor' => 'required|numeric',
            'radius'     => 'required|integer|min:10'
        ]);

        $pengaturan = Pengaturan::first();
        if (!$pengaturan) {
            $pengaturan = new Pengaturan();
        }

        $pengaturan->lat_kantor = $request->lat_kantor;
        $pengaturan->lng_kantor = $request->lng_kantor;
        $pengaturan->radius     = $request->radius;
        $pengaturan->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}