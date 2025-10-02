<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    // Nama tabel di database
    protected $table = 'gurus';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'email',
        'nip',
        'mapel'
    ];

    // Relasi: 1 guru punya banyak absensi
    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'guru_id');
    }
}