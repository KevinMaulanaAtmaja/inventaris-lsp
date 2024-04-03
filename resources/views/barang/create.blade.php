@extends('layout.main')
@section('konten')
<div class="col-sm-10 col-10 col-md-6 col-xl-6 mx-auto mt-5">
    <div class="card mt-5 d-flex">
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-3 mx-5">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}">
            </div>
            <div class="my-3 mx-5">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" id="gambar" name="gambar" class="form-control">
            </div>

            <div class="mb-3 mx-5">
                <button class="btn btn-success">Tambah Data</button>
                <a href="/barang" class="btn btn-primary"><< Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
