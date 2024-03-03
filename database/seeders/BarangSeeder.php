<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'B01',
                'barang_nama' => 'Lays',
                'harga_beli' => 8000,
                'harga_jual' => 10000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 2,
                'barang_kode' => 'B02',
                'barang_nama' => 'Nutriboost',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 3,
                'barang_kode' => 'B03',
                'barang_nama' => 'T-Shirt Uniqlo',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 4,
                'barang_kode' => 'B04',
                'barang_nama' => 'Gundam',
                'harga_beli' => 300000,
                'harga_jual' => 350000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 5,
                'barang_kode' => 'B05',
                'barang_nama' => 'TWS',
                'harga_beli' => 280000,
                'harga_jual' => 300000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 1,
                'barang_kode' => 'B06',
                'barang_nama' => 'Chitato',
                'harga_beli' => 8000,
                'harga_jual' => 11000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 2,
                'barang_kode' => 'B07',
                'barang_nama' => 'Freshtea',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'B08',
                'barang_nama' => 'Hoodie H&M',
                'harga_beli' => 450000,
                'harga_jual' => 500000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 4,
                'barang_kode' => 'B09',
                'barang_nama' => 'Hotwheels',
                'harga_beli' => 45000,
                'harga_jual' => 50000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'B10',
                'barang_nama' => 'Speaker',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
