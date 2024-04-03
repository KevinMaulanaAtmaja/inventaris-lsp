@extends('layout.main')
@section('konten')
<div class="col-sm-10 col-10 col-md-6 col-xl-6 mx-auto mt-5">
    <div class="card mt-5 d-flex">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="my-3 mx-5">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control" name="nama_barang"
                    value="{{ old('nama_barang', $barang->nama_barang) }}">
            </div>
            <div class="my-3 mx-5">
                <img src="{{ asset('storage/images/' . $barang->gambar) }}" width="120"
                    class="img-thumbnail img-fluid d-block ">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" id="gambar" name="gambar" class="form-control" value="{{ $barang->gambar }}">
            </div>

            <div class="mb-3 mx-5">
                <button class="btn btn-success">Update Data</button>
                <a href="/barang" class="btn btn-primary"><< Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
