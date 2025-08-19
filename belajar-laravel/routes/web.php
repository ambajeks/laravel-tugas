<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about',[
        'nama' => 'jeknjt',
        'umur' => 20,
        'alamat' => 'jl. israel hama',
    ]);
});

Route::view('/contact','pages.contact');

// Satu Controller banyak method
Route::get('/product',[ProdukController::class, 'index']); //read data menampilkan data 
Route::get('/product/create',[ProdukController::class, 'create']); // menampilkan form data

Route::post('/product', [ProdukController::class, 'store']); // untuk mengelola data yang telah dikirim dari halaman form data

Route::get('/produk/{id}', [ProdukController::class, 'show']);