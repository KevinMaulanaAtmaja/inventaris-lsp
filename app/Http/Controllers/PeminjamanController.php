<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Siswa;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['siswa', 'barang'])->latest()->paginate(2);
        // dd($peminjaman);
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $peminjaman = Peminjaman::with(['siswa', 'barang']);
        $siswa = Siswa::all();
        $barang = Barang::all();
        return view('peminjaman.create', compact(['siswa', 'barang']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|min:1',
            'nama_barang' => 'required|min:1',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
        ]);

        Peminjaman::create([
            'id_siswa' => $request->nama_siswa,
            'id_barang' => $request->nama_barang,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect('/peminjaman')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        $siswa = Siswa::all();
        $barang = Barang::all();
        return view('peminjaman.edit', compact(['peminjaman', 'siswa', 'barang']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required|min:1',
            'nama_barang' => 'required|min:1',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
        ]);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->update([
            'id_siswa' => $request->nama_siswa,
            'id_barang' => $request->nama_barang,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect('/peminjaman')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();
        return redirect('/peminjaman')->with('success', 'Data berhasil dihapus!');
    }
}
