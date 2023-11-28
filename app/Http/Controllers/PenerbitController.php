<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }

    public function store(Request $request)
        {
            //dd($request->all());

            //untuk menampung request ke dalam field
            $penerbit = new Penerbit;
            $penerbit ->kode = $request->kode;
            $penerbit ->nama = $request->nama;

            //proses simpan ke dalam table
            $penerbit->save();

            //setelah sukses simpan data,maka akan reload ke penerbit.index
            return redirect('penerbit')->with('sukses', 'Data Berhasil Disimpan');
        }
        public function edit($id)
        {
            $penerbit = Penerbit::find($id);
            return view('penerbit.edit', compact('penerbit'));
        }
        public function update(Request $request,$id)
        {
            $penerbit = Penerbit::find($id);
            $penerbit->kode = $request->kode;
            $penerbit->nama = $request->nama;
            $penerbit->Update();

            return redirect('penerbit');
        }
        public function destroy($id)
        {
            $penerbit = Penerbit::find($id);
            $penerbit->delete();

            return redirect('penerbit')->with('sukses', 'Data Berhasil Dihapus');
        }
}
