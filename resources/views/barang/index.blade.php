@extends('layout.main')
@section('konten')
<h1 class="text-primary">Semua Barang</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nama Barang</th>
            <th scope="col">Gambar</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <a href="{{ route('barang.create') }}" class="btn btn-primary mt-3">+ Tambah Barang</a>
        @foreach ($barang as $b)
            <tr>
                <td>{{ $b->nama_barang }}</td>
                <td><img src="{{ asset('images/' . $b->gambar) }}" width="120"></td>
                <td>
                    <form action="">
                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a onclick="return confirm('apa yakin?')" href="{{ route('barang.destroy', $b->id) }}" class="btn btn-danger btn-sm">Hapus
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $barang->links() }}
@endsection

