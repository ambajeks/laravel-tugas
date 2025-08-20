<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $toko = [
            'nama_toko'=> 'Toko Jeknjt',
            'alamat' => 'Jl israel Hama hutabarat',
            'type' => 'Ruko'
        ];
        $produk = Produk::get(); // query untuk mengambil semua data tb_produk
        //$queryBuilder = DB::table('tb_produk')->get();

        return view('pages.produk.show',[
            'data_toko' => $toko,
            'data_produk' => $produk
        ]);
    }

    public function create()
    {
        return view('pages.produk.add');
    }

    public function store(Request $request){
        // Validasi
        $request->validate([
            'nama_produk' => 'required|min:8|max:12', // nama produk wajib diisi
            'harga_produk' => 'required',
            'deskripsi' => 'required',
        ],
        [
           'nama_produk.min' => 'Nama produk minimal 8 karakter',
           'nama_produk.max' => 'Nama produk maksimal 12 karakter',
           'nama_produk.required' => 'inputan nama produk wajib diisi',
           'harga_produk.required' => 'inputan harga produk wajib diisi',
           'deskripsi.required' => 'inputan deskripsi produk wajib diisi',
        ]);

        // query tambah data
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi,
            'kategori_id' =>'1'
        ]);

        // setelah data berhasil di tambah, akan diarahkan ke halaman /product dan memberikan noitifikasi berhasil menambahkan data
        return redirect('/product')->with('message', 'Data produk berhasil ditambahkan!');
    }

    public function show($id){
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan!');
        }
        return view('pages.produk.detail', ['produk' => $produk]);
    }

    public function edit($id){
        $data = produk::findOrFail($id);

        return view('pages.produk.edit', [
            'data'=>$data,
        ]);
    }

    public function update($id,Request $request){
         // Validasi
        $request->validate([
            'nama_produk' => 'required|min:8', // nama produk wajib diisi
            'harga_produk' => 'required',
            'deskripsi' => 'required',
        ],
        [
           'nama_produk.min' => 'Nama produk minimal 8 karakter',
           'nama_produk.required' => 'inputan nama produk wajib diisi',
           'harga_produk.required' => 'inputan harga produk wajib diisi',
           'deskripsi.required' => 'inputan deskripsi produk wajib diisi',
        ]);

        produk::where('id_produk', $id)->update ([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
        ]);

        return redirect('product')->with('message', 'data berhasil di edit');
    }
}