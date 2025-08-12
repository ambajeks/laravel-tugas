<?php

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
Route::view('/product','pages.product');
