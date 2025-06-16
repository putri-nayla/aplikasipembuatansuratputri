<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(PeminjamSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(BukuSeeder::class);
        $this->call(DendaSeeder::class);
        $this->call(PeminjamanSeeder::class);
        $this->call(DetilPeminjamanSeeder::class);
        $this->call(suratSeeder::class);
        $this->call(laporanSeeder::class);
        // database/seeders/DatabaseSeeder.php
       
    $this->call([
        LaporanSeeder::class,
    ]);

 $this->call([
        SuratSeeder::class,
        
    ]);


}
}

