@extends('layouts.master')

@section('konten')
<h1>Detail Produk Kami</h1>
<hr>

   <div class="card">
    <div class="card-header">
       Detail Produk
    </div>

  
  <div class="card-body">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data_produk as $item)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $item->nama_produk }}</td>
      <td>{{ $item->harga }}</td>
      <td>{{ $item->deskripsi_produk }}</td>
      <td>
        <button type="button" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-warning">Edit</button>
        <a href="/produk/{{$item->id_produk}}" class="btn btn-info">Detail</a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
  </div>
</div>
@endsection
