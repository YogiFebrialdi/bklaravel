@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">History Pelanggaran Siswa</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
<<<<<<< HEAD
      <div class="card card-info card-outline">
          <div class="card-header">
      </div>
=======
        <div class="card card-info card-outline">
            <div class="card-header">
        </div>
>>>>>>> inputpelanggaran
        @if ($message = Session:: get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">@sortablelink('nisn', 'NIS')</th>
                    <th scope="col">@sortablelink('nama', 'NAMA')</th>
                    <th scope="col">KELAS</th>
                    <th scope="col">Bentuk Pelanggaran</th>
                    <th scope="col">Bobot</th>
                    <th scope="col">Oleh</th>
                    <th scope="col">Tanggal Pelanggaran</th>
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
                    <td>{{ $item->bentukpelanggaran}}</td>
                    <td>{{ $item->bobot}}</td>
                    <td>{{ $item->oleh}}</td>
                    <td>{{ $item->tgl}}</td>
                    <td>{{date('d-m-Y', strtotime($item->ttl)) }}</td>
                    <td>{{ $item->aksi}}</td>
                    <td>
<<<<<<< HEAD
                        <a href="delete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus History Pelanggaran?');"  class="btn btn-danger">Delete</a>
=======
                        <a href="delete-historypelanggaran/{{$item->id}}" class="btn btn-danger">Delete</a>
>>>>>>> e4523c01082f712c9b6cc39345d3e4b33f146df2
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
