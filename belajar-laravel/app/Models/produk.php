<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    // inisialisasi table produk
    protected $table = 'tb_produk';

    // inisialisasi primary key dalam table
    protected $primaryKey = 'id_produk';

    // inisialisasi data yang dapat kita isi
    //protected $fillable = ['nama_produk','harga','stok'];

    // inisialisasi yang tidak boleh kita isi
    protected $guarded = [
        'id_produk'
    ];
}
