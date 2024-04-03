@extends('layout.main')
@section('konten')
<div class="col-sm-10 col-10 col-md-6 col-xl-6 mx-auto mt-5">
    <div class="card mt-5 d-flex">
        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-3 mx-5">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <select name="nama_siswa" id="nama_siswa" class="form-control">
                    <option value="">--Pilih Nama Siswa--</option>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->id }}" {{ $s->id == $peminjaman->id_siswa ? 'selected' : '' }}>{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-3 mx-5">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <select name="nama_barang" id="nama_barang" class="form-control">
                    <option value="">--Pilih Nama Barang--</option>
                    @foreach ($barang as $b)
                        <option value="{{ $b->id }}" {{ $b->id == $peminjaman->id_barang ? 'selected' : '' }}>{{ $b->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-3 mx-5">
                <label for="tgl_pinjam" class="form-label">Tgl Pinjam</label>
                <input type="date" id="tgl_pinjam" class="form-control" name="tgl_pinjam" value="{{ old('tgl_pinjam', $peminjaman->tgl_pinjam) }}">
            </div>
            <div class="my-3 mx-5">
                <label for="tgl_kembali" class="form-label">Tgl Kembali</label>
                <input type="date" id="tgl_kembali" class="form-control" name="tgl_kembali" value="{{ old('tgl_kembali', $peminjaman->tgl_kembali) }}">
            </div>

            <div class="mb-3 mx-5">
                <button class="btn btn-success">Ubah Data</button>
                <a href="/peminjaman" class="btn btn-primary"><< Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
