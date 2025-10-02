<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Absensi;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Tampilkan dashboard admin
     */
    public function index()
    {
        $totalGuru = Guru::count();
        $hariIni   = Carbon::today()->toDateString();

        // Rekap absensi hari ini
        $hadir = Absensi::where('tanggal', $hariIni)->where('status', 'hadir')->count();
        $izin  = Absensi::where('tanggal', $hariIni)->where('status', 'izin')->count();
        $sakit = Absensi::where('tanggal', $hariIni)->where('status', 'sakit')->count();
        $alpha = Absensi::where('tanggal', $hariIni)->where('status', 'alpha')->count();

        return view('admin.dashboard', [
            'totalGuru' => $totalGuru,
            'hadir'     => $hadir,
            'izin'      => $izin,
            'sakit'     => $sakit,
            'alpha'     => $alpha,
            'tanggal'   => $hariIni
        ]);
    }
}