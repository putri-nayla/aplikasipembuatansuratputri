<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->insert([
            ['namaadmin' => 'Admin1', 'username' => 'admin1', 'password' => Hash::make('admin123'), 'status' => 'setujui', 'role' => 'admin', 'foto' => null, 'setujui' => now()],
            ['namaadmin' => 'Admin2', 'username' => 'admin2', 'password' => Hash::make('admin123'), 'status' => 'setujui', 'role' => 'petugas', 'foto' => null, 'setujui' => now()],
            ['namaadmin' => 'Admin3', 'username' => 'admin3', 'password' => Hash::make('admin123'), 'status' => 'pending', 'role' => 'admin', 'foto' => null, 'setujui' => null],
            ['namaadmin' => 'Admin4', 'username' => 'admin4', 'password' => Hash::make('admin123'), 'status' => 'tolak', 'role' => 'petugas', 'foto' => null, 'setujui' => null],
            ['namaadmin' => 'Admin5', 'username' => 'admin5', 'password' => Hash::make('admin123'), 'status' => 'setujui', 'role' => 'admin', 'foto' => null, 'setujui' => now()],
            ['namaadmin' => 'Adminputri', 'username' => 'adminputri', 'password' => Hash::make('adminputri'), 'status' => 'setujui', 'role' => 'admin', 'foto' => null, 'setujui' => now()],
            ['namaadmin' => 'petugasputri', 'username' => 'petugasputri', 'password' => Hash::make('petugasputri'), 'status' => 'setujui', 'role' => 'petugas', 'foto' => null, 'setujui' => now()],
        ]);
    }
}

    
