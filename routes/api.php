<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AbsensiController as ApiAbsensiController;

// Semua route API otomatis prefix: /api/...
Route::prefix('absensi')->group(function () {
    Route::get('/', [ApiAbsensiController::class, 'index']);       // GET semua absensi
    Route::post('/', [ApiAbsensiController::class, 'store']);      // POST absensi baru
    Route::put('/{id}', [ApiAbsensiController::class, 'update']);  // PUT update absensi
    Route::delete('/{id}', [ApiAbsensiController::class, 'destroy']); // DELETE absensi
});