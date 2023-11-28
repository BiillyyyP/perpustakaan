@extends('layout.app')

@section('title','anggota')

@section('content')

<section class="section">
    <div class="section-header">
        <h4>Buku</h4>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Buku</h4>
            </div>

            <div class="card-body">
                <form action="{{route('buku.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="class" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="class" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="kategori_id">Kategori</label>
                            <select type="kategori_id" name="kategori_id" id="kategori_id" class="form-control">
                                <@foreach($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="penerbit_id">Penerbit</label>
                            <select type="penerbit_id" name="penerbit_id" id="penerbit_id" class="form-control">
                                @foreach($penerbit as $pt)
                                <option value="{{$pt->id}}">{{$pt->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="isbn">ISBN</label>
                            <input type="number" name="isbn" id="isbn" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" id="pengarang" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="jumlah_halaman">Jumlah Halaman</label>
                            <input type="number" name="jumlah_halaman" id="jumlah_halaman" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="date" name="tahun_terbit" id="tahun_terbit" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="sinopsis">Sinopsis</label>
                           <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gambar">Sampul</label>  
                            <input type="file" name="gambar" id="gambar" class="form-control">
                        </div>
                    </div>

                    <button type="sumbit" class="btn btn-success"><i class="fa fa-save"></i>Simpan</button>
                </form>

            </div>

        </div>
</section>
@endsection'