@extends('layouts.master')
{{-- Meng-extend layout utama 'master' agar tampilan konsisten di seluruh halaman. --}}

@section('konten')
    {{-- Mendefinisikan section 'konten' yang akan diisi pada layout master. --}}

    <h1>Daftar Product</h1>
    {{-- Judul halaman. --}}

    <hr>
    {{-- Garis horizontal sebagai pemisah. --}}

    <a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah Data</a>
    {{-- Tombol untuk menambah data produk baru, mengarah ke halaman tambah produk. --}}

    <div class="alert alert-primary">
        <b>Nama Toko :</b> {{ $data_toko['nama_toko'] }}
        <br>
        <b>Alamat :</b> {{ $data_toko['alamat'] }}
        <br>
        <b>Tipe Toko :</b> {{ $data_toko['type'] }}
    </div>
    {{-- Menampilkan informasi toko yang dikirim dari controller. --}}
    @if (session('messege'))
        <div class="alert alert-primary">{{ session('messege') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Daftar Produk

            {{-- Header card, menampilkan judul daftar produk. --}}
            <div class="d-flex gap-2">
                @if (Request()->keyword != '')
                    <a href="/product" class="btn btn-info">Reset</a href="/product">
                @endif
                <form class="input-group" style="width: 350px">
                    <input type="text" class="form-control" value="{{ Request()->keyword }}" name="keyword"
                        placeholder="Cari Data Produk">
                    <button class="btn btn-success" type="submit" id="button-addon2">Cari Data</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                {{-- Tabel untuk menampilkan data produk. --}}
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        {{-- Kolom nomor urut. --}}
                        <th scope="col">Nama Produk</th>
                        {{-- Kolom nama produk. --}}
                        <th scope="col">Harga</th>
                        {{-- Kolom jumlah stok. --}}
                        <th scope="col">Deskripsi</th>
                        {{-- Kolom harga produk. --}}
                        <th scope="col">Aksi</th>
                        {{-- Kolom aksi (edit/hapus). --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_produk as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->deskripsi_produk}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{ $item->id_produk }}">
                                    {{-- Tombol untuk menghapus produk, memicu modal konfirmasi hapus. --}}
                                    Hapus
                                </button>
                                <!-- <button type="button" class="btn btn-danger">Hapus</button> -->
                                {{-- Tombol untuk menghapus produk. --}}
                                <a href="/product/{{ $item->id_produk }}/edit" class="btn btn-warning me-1">Edit</a>
                                <a href="/product/{{ $item->id_produk }}" class="btn btn-info">Detail</a>

                                {{-- Tombol untuk Melihat Detail produk. --}}
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data yang kamu cari gak ada ya sayangg</td>
                        </tr>
                    @endforelse


                    {{-- Baris-baris data produk (saat ini masih statis). --}}
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    @foreach ($data_produk as $item)
        <div class="modal fade" id="hapus{{ $item->id_produk }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/product/{{ $item->id_produk }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    {{-- Token CSRF untuk keamanan, dan method DELETE untuk menghapus data. --}}
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi lekk!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $item->nama_produk }} ini bakal dihapus looh, kamu yakin gak sayangg???
                        {{-- Pesan konfirmasi sebelum menghapus produk. --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
{{-- Penutup section 'konten'. --}}