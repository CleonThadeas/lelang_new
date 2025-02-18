<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        // Pastikan level sudah ada sebelum menambahkan petugas/admin
        DB::table('tb_petugas')->insert([
            [
                'nama_petugas' => 'Super Admin',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'id_level' => 1, // Pastikan 1 ada di tb_level
            ],
            [
                'nama_petugas' => 'Petugas 1',
                'username' => 'petugas',
                'password' => Hash::make('petugas123'),
                'id_level' => 2, // Pastikan 2 ada di tb_level
            ],
        ]);
    }
}
