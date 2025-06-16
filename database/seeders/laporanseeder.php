<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laporans')->insert([
            [
                'judul' => 'Laporan Keuangan Januari',
                'isi' => 'Ini adalah laporan keuangan bulan Januari.',
                'tanggal' => Carbon::now()->subMonths(4)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Laporan Kinerja Februari',
                'isi' => 'Ini adalah laporan kinerja bulan Februari.',
                'tanggal' => Carbon::now()->subMonths(3)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Laporan Audit Maret',
                'isi' => 'Ini adalah laporan audit bulan Maret.',
                'tanggal' => Carbon::now()->subMonths(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
