<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\penerbit;

use App\Models\kategori;

class BukuController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('kategori','penerbit'));
    }

    public function store(Request $request)
    {
        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());
        Buku::create([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'stok' => $request->stok,
            'tahun_terbit' => $request->tahun_terbit,
            'sinopsis' => $request->sinopsis,
            'gambar' => $image->hashName(),

            
        ]);

        return redirect('buku')->with('sukses', 'Data berhasil disimpan');

    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('buku','kategori','penerbit'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());

        $buku = Buku::find($id);
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_id = $request->kategori_id;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->isbn = $request->isbn;
        $buku->pengarang = $request->pengarang;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->sinopsis = $request->sinopsis;
        $buku->gambar = $image->hashName();
        $buku->Update();

        return redirect('buku')->with('sukses', 'Data berhasil di Update');

    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku')->with('sukses','databerhasil dihapus');
    }

    
}