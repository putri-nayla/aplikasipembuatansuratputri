<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            'Undangan',
            'Pemberitahuan',
            'Pengumuman',
            'Izin',
            'Laporan',
        ];

        foreach ($kategoris as $nama) {
            Kategori::create([
                'nama' => $nama
            ]);
        }
    }
}
