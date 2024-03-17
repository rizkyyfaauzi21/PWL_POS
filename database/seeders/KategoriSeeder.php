<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            // [
            //     'kategori_id' => 1,
            //     'kategori_kode' => 'A01',
            //     'kategori_nama' => 'Makanan',
            // ],
            // [
            //     'kategori_id' => 2,
            //     'kategori_kode' => 'A02',
            //     'kategori_nama' => 'Minuman',
            // ],
            // [
            //     'kategori_id' => 3,
            //     'kategori_kode' => 'A03',
            //     'kategori_nama' => 'Pakaian',
            // ],
            // [
            //     'kategori_id' => 4,
            //     'kategori_kode' => 'A04',
            //     'kategori_nama' => 'Mainan',
            // ],
            // [
            //     'kategori_id' => 5,
            //     'kategori_kode' => 'A05',
            //     'kategori_nama' => 'Elektronik',
            // ],
            [
                'kategori_id' => 6,
                'kategori_kode' => 'CML',
                'kategori_nama' => 'Cemilan',
            ],
            [
                'kategori_id' => 7,
                'kategori_kode' => 'MNR',
                'kategori_nama' => 'Minuman Ringan',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}