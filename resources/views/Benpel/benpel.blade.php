@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bentuk Pelanggaran</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
            <div class="card-tools">
                <a href="create-benpel" class="btn btn-success">Tambah Bentuk Pelanggaran<i class="fas fa-plus-square"></i></a>
            </div>
        </div>
        @if ($message = Session:: get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
        @endif


        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">@sortablelink('kategori_id', 'KATEGORI')</th>
                    <th scope="col">BENTUK PELANGGARAN</th>
                    <th scope="col">BOBOT</th>
                    <th scope="col">Aksi</th>
                </tr>
                @php
                  $no = 1 + (($data->currentPage()-1) * $data->perPage());
                @endphp
                @foreach ($data as $item)
                <tr>
                    <th scope="item">{{ $no++}}</th>
                    <td>{{ $item->kategori->kategori}}</td>
                    <td>{{ $item->benpel}}</td>
                    <td>{{ $item->bobot}}</td>
                    <td>
                        <a href="edit-benpel/{{$item->id}}" class="btn btn-info">Edit</a>
                        <a href="delete-benpel/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Sanksi?');"  class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>
            <div class="card-footer">
              <!-- {{ $data->links() }} -->
              {!! $data->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

  @endsection
