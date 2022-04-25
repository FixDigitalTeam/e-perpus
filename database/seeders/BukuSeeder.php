<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bukus')->insert([
            'judul' => 'Buku 1',
            'pengarang' => 'Pengarang 1',
            'penerbit' => 'Penerbit 1',
            'tahun_terbit' => '2020',
            'stock' => '10'
        ]);
    }
}
