<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::latest()->paginate(2);
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
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
            'nama_barang' => 'required|min:1',
            'gambar' => 'required|mimes:png,jpg,jpeg|image',
        ]);

        // Simpan gambar yang diunggah
        $imageName = time().'.'.$request->gambar->extension();
        // $request->gambar->move(public_path('images'), $imageName);
        $request->gambar->storeAs('public/images', $imageName);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'gambar' => $imageName,
        ]);

        return redirect('/barang')->with('success', 'Data berhasil ditambahkan!');
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
        $barang = Barang::find($id);
        // dd($barang->gambar);
        return view('barang.edit', compact('barang'));
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
            'nama_barang' => 'required|min:1',
            'gambar' => 'nullable|mimes:png,jpg,jpeg|image',
        ]);

        $barang = Barang::find($id);
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            // $request->gambar->move(public_path('images'), $imageName);
            $request->gambar->storeAs('public/images', $imageName);

            // Hapus gambar lama jika ada
            if ($barang->gambar) {
                Storage::delete('public/images/' . $barang->gambar);
            }

            $barang->update([
                'nama_barang' => $request->nama_barang,
                'gambar' => $imageName,
            ]);
        } else {
            $barang->update([
                'nama_barang' => $request->nama_barang,
            ]);
        }

        return redirect('/barang')->with('success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        // dd($barang);

        if ($barang) {
            Storage::delete('public/images/' . $barang->gambar);
            $barang->delete();
            return redirect('/barang')->with('success','Data berhasil dihapus!');
        }
    }
}
