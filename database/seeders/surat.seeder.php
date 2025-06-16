<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;
use Illuminate\Support\Str;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh kategori_id, sesuaikan dengan data kategori yang sudah ada
        $kategoriId = 1;

        for ($i = 1; $i <= 5; $i++) {
            Surat::create([
                'judul' => "Surat Contoh ke-$i",
                'nomor_surat' => "ND-00$i/2025",
                'tanggal' => now()->subDays($i),
                'kategori_id' => $kategoriId,
                'tujuan' => "Tujuan Surat $i",
                'file' => "surat/contoh_$i.pdf", // Pastikan file dummy ini ada atau buat di storage/app/public/surat
                'keterangan' => "Ini surat contoh nomor $i",
                'status' => 'draft',
            ]);
        }
    }
}
