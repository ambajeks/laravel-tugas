<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_produk')->insert([
        [
            'nama_produk'=>'Smart TV Samsung 24 Inch',
            'harga'=>'15000000',
            'deskripsi_produk'=>'TV gacor buat nobar bokep sama om ditya',
            'kategori_id'=>'2',
            'created_at'=>now()
        ],[
            'nama_produk'=>'Laptop Predator',
            'harga'=>'25000000',
            'deskripsi_produk'=>'laptop gaming dengan performa tinggi dan spesifikasi mumpuni cocok untuk bermain game berat dan ngding berat',
            'kategori_id'=>'2',
            'created_at'=>now()
        ],[
            'nama_produk'=>'Smartwatch',
            'harga'=>'73000000',
            'deskripsi_produk'=>'cocok buat kalian yang suka olahraga dan ingin memantau kesehatan dan aktivitas sehari-hari',
            'kategori_id'=>'2',
            'created_at'=>now()
        ]
        ]);
    }
}