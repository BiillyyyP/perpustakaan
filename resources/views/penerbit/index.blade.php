@extends('layout.app')

@section('title','Penerbit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Penerbit</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Penerbit</h4>
                <div class="card-header-form">
                    <button class="btn-sm btn btn-success" data-toggle="modal" data-target="#modal-form"><i class="fa fa-plus"></i>Tambah Data</button>
                </div>
            </div>


            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($penerbit as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <form action="/penerbit/{{$item->id}}" method="GET" id="delete-form">
                                    @method('delete')
                                <a href="/penerbit/{{$item->id}}/edit" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete()"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('penerbit.form')
@endsection
@push('script')
<script>
    function confirmDelete()
    {
        event.preventDefault();
        swal({
            title: 'Apakah Anda yakin',
            text: 'Setelah dihapus,Anda tidak dapat memulihkannya!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-form').submit();
            }
        });
    }
</script>
@endpush   
