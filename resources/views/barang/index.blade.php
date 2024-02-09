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
            <td><img src="{{ asset('storage/images/' . $b->gambar) }}" width="80"></td>
            <td>
                <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('barang.destroy', $b->id) }}" class="d-inline" method="POST"
                    onclick="return confirm('apa yakin?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $barang->links() }}
@endsection
