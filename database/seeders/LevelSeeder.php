<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('tb_level')->insert([
            ['nama_level' => 'administrator'],
            ['nama_level' => 'petugas'],
            ['nama_level' => 'masyarakat'],
        ]);
    }
}
