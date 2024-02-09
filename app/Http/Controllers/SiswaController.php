<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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
        $siswa->delete();
        // dd($siswa);
        return redirect('/siswa')->with('success', 'Data berhasil dihapus!');
    }
}
