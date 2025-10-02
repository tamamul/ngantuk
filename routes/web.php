<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\PengaturanController;

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');

// CRUD Guru
Route::resource('guru', GuruController::class)->middleware('auth');

// CRUD Absensi (untuk admin)
Route::resource('absensi', AbsensiController::class)->middleware('auth');

// Pengaturan (misalnya lokasi kantor, radius, dll)
Route::get('/pengaturan', [PengaturanController::class, 'index'])->middleware('auth');
Route::post('/pengaturan', [PengaturanController::class, 'update'])->middleware('auth');