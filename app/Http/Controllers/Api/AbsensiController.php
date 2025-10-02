<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    /**
     * Menampilkan semua data absensi (JSON)
     */
    public function index()
    {
        $data = Absensi::with('guru')->get();
        return response()->json($data);
    }

    /**
     * Simpan absensi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|integer|exists:gurus,id',
            'status'  => 'required|string|in:hadir,izin,sakit,alpha'
        ]);

        $absensi = Absensi::create([
            'guru_id' => $request->guru_id,
            'tanggal' => now(),
            'status'  => $request->status
        ]);

        return response()->json([
            'message' => 'Absensi berhasil disimpan',
            'data'    => $absensi
        ]);
    }

    /**
     * Update status absensi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:hadir,izin,sakit,alpha'
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->status = $request->status;
        $absensi->save();

        return response()->json([
            'message' => 'Absensi berhasil diupdate',
            'data'    => $absensi
        ]);
    }

    /**
     * Hapus absensi
     */
    public function destroy($id)
    {
        Absensi::destroy($id);

        return response()->json([
            'message' => 'Absensi berhasil dihapus'
        ]);
    }
}