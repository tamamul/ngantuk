<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    // Nama tabel di database
    protected $table = 'absensis';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'guru_id',
        'tanggal',
        'status',
    ];

    // Relasi ke tabel guru (satu absensi dimiliki oleh satu guru)
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}