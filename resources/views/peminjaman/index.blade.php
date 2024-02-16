@extends('layout.main')
@section('konten')
<h1 class="text-primary">Semua Peminjaman</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Siswa</th>
            <th scope="col">Barang</th>
            <th scope="col">Tgl Pinjam</th>
            <th scope="col">Tgl Kembali</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mt-3">+ Tambah Peminjaman</a>
        @foreach ($peminjaman as $p)
        <tr>
            <td>{{ $p->siswa->nama }}</td>
            <td><img src="{{ asset('storage/images/' . $p->barang->gambar) }}" width="80"></td>
            <td>{{ $p->tgl_pinjam }}</td>
            <td>{{ $p->tgl_kembali }}</td>
            <td>
                <a href="{{ route('peminjaman.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('peminjaman.destroy', $p->id) }}" class="d-inline" method="POST"
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
{{ $peminjaman->links() }}
@endsection
