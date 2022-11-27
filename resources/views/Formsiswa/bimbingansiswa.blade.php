@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bimbingan Siswa</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
            <div class="card-tools">
                <a href="create-bimbingansiswa" class="btn btn-success">Tambah Bimbingan Siswa <i class="fas fa-plus-square"></i></a>
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
          CARI Bimbingan
          </label>
          <div class="col-sm-10">
            <input type="text" name="cari" id="cari" class="form-control" placeholder="cari data berdasarkan tanggal bimbingan/nama/kelas"
            autofocus="true" value="{{ $cari}}">
          </div>
        </div>
      </form>
      </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">@sortablelink('tglbim', 'Tanggal Bimbingan')</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th width="30%">Bimbingan</th>
                    <th width="20%">Tanggapan</th>
                    <th scope="col">Aksi</th>
                </tr>
                @php
                  $no = 1 + (($data->currentPage()-1) * $data->perPage());
                @endphp
                @foreach ($data as $item)
                <tr>
                    <th scope="item">{{ $no++}}</th>
                    <td>{{date('d-m-Y', strtotime($item->tglbim)) }}</td>
                    <td>{{ $item->nama}}</td>
                    <td>{{ $item->kelas}}</td>
                    <td>{{ $item->bimbingan}}</td>
                    <td>{{ $item->tanggapan}}</td>
                    <td>
                        <a href="edit-bimbingansiswa/{{$item->id}}" class="btn btn-info">Edit</a>
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
