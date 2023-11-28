@extends('layout.app')

@section('title','buku')

@section('content')

<section class="section">
    <div class="section-header">
        <h4>Buku</h4>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buku</h4>

                <div class="card-header-form">
                    <a href="{{route('buku.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Tambah Data Buku</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th>Code</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Jumlah Halaman</th>
                            <th>Sampul</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                     @foreach ($buku as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{!! DNS1D::getBarcodeHTML('$' .$item->kode, 'C39+',1,25)!!}</td>

                        <td>{{$item->judul}}</td>
                        <td>{{$item->pengarang}}</td>
                        <td>{{$item->jumlah_halaman}}</td>
                        <td><img src="{{asset('/storage/buku/'.$item->gambar)}}" class="rounded" style="width: 100px;"></td>
                        <td>
                            <form action="/buku/{{$item->id}}" method="POST" id="delete-form">
                             @method('delete')  
                             @csrf 
                             <a href="/buku/{{$item->id}}/edit" class="btn btn-warning btn-sm">
                             <i class="fa fa-edit"></i></a>
                             <button class= "btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete()"></button>

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
@endsection
@push('script')
  <script>
    function confirmDelete()
    {
        event.preventDefault();
        swal({
         title: 'Yakin a iki?',
         text: 'Lah dihapus Data e ora balek ojo salahno aku',
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

@push('script')
<script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script>
@endpush