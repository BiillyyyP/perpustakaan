@extends('layout.app')

@section('title','Edit Anggota')

@section('content')

<section class="section">
    <div class="section-header">
        <h4>Anggota</h4>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Anggota</h4>
            </div>

            <div class="card-body">
                <form action="{{route('anggota.update', $anggota->id)}}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="class" class="form-control" value="{{$anggota->kode}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="class" class="form-control" value="{{$anggota->nama}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select type="jenis_kelamin" name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{$anggota->jenis_kelamin}}">
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{$anggota->tempat_lahir}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="telpon">Telpon</label>
                            <input type="number" name="telpon" id="telpon" class="form-control" value="{{$anggota->telpon}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{$anggota->tanggal_lahir}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                           <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{$anggota->alamat}}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="foto">Foto</label>  
                            <input type="file" name="foto" id="foto" class="form-control" value="{{$anggota->foto}}">
                        </div>
                    </div>

                    <button type="sumbit" class="btn btn-warning"><i class="fa fa-save"></i>Update</button>
                </form>

            </div>

        </div>
</section>
@endsection