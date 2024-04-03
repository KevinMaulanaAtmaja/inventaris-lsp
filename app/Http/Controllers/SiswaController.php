<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::latest()->paginate(5);
        // dd($siswa);
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Session::get('success');
        $request->validate([
            'nama' => 'required|min:5',
            'kelas' => 'required'
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        // dd($siswa);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'kelas' => 'required'
        ]);

        $siswa = Siswa::find($id);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        return redirect('/siswa')->with('success', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        if ($siswa) {
            // Periksa apakah siswa masih dipakai dalam peminjaman
            $p = Peminjaman::where('id_siswa', $siswa->id)->exists();
            // dd($p);
            if ($p) {
                return redirect('/siswa')->with('error', 'Data siswa masih dipakai dan tidak dapat dihapus!');
            }

            $siswa->delete();
            return redirect('/siswa')->with('success', 'Data berhasil dihapus!');
        }
    }
}
