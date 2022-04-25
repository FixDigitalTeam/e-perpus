<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'nama_member' => 'admin',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Kebon Jeruk',
            'nomor_hp' => '08123456789'
        ]);
    }
}
