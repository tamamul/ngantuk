<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyDataSeeder extends Seeder {
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('gurus')->insert([
                'nama' => "Guru $i",
                'email' => "guru$i@sekolah.com",
                'nip' => "NIP$i",
                'mapel' => "Mapel $i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('pengaturans')->insert([
            'lat_kantor' => -6.2088,
            'lng_kantor' => 106.8456,
            'radius' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}