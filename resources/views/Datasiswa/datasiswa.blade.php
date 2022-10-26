@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Siswa</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
            <div class="card-tools">
                <a href="create-datasiswa" class="btn btn-success">Tambah Data Siswa <i class="fas fa-plus-square"></i></a>
            </div>
        </div>
        @if ($message = Session:: get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
        @endif

      <div class="card-header">
      <form method="GET">
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">
          CARI SISWA
          </label>
          <div class="col-sm-10">
            <input type="text" name="cari" id="cari" class="form-control" placeholder="cari data berdasarkan nama/nim"
             autofocus="true" value="{{ $cari}}">
          </div>
        </div>
      </form>
      </div>


        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">@sortablelink('nisn', 'NISN')</th>
                    <th scope="col">@sortablelink('nama', 'NAMA')</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Walimurid</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
                @php
                  $no = 1 + (($data->currentPage()-1) * $data->perPage());
                @endphp
                @foreach ($data as $item)
                <tr>
                    <th scope="item">{{ $no++}}</th>
                    <td>{{ $item->nisn}}</td>
                    <td>{{ $item->nama}}</td>
                    <td>{{ $item->kelas}}</td>
                    <td>{{ $item->jk}}</td>
                    <td>{{date('d-m-Y', strtotime($item->ttl)) }}</td>
                    <td>{{ $item->alamat}}</td>
                    <td>{{ $item->walimurid}}</td>
                    <td>{{ $item->telepon}}</td>
                    <td>
                        <a href="edit-datasiswa/{{$item->id}}" class="btn btn-info">Edit</a>
                        <a href="delete-datasiswa/{{$item->id}}" class="btn btn-danger">Delete</a>
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
