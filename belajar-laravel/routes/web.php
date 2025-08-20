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

Route::get('/product/{id}', [ProdukController::class, 'show']);

Route::get('/product/{id}/edit', [ProdukController::class, 'edit']); // menampilkan form edit data
Route::put('/product/{id}', [ProdukController::class, 'update']); // mengelola data yang telah dikirim dari halaman form edit data

Route::delete('/product/{id}', [ProdukController::class, 'destroy']); // menghapus data produk