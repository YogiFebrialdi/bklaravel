@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Bimbingan</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools">
                </div>
        </div>
        @if ($message = Session:: get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
        @endif

        <form method="GET">
        <div class="card-header">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">
              CARI BIMBINGAN
              </label>
              <div class="col-sm-10">
                <input type="text" name="cari" id="cari" class="form-control" placeholder="cari data berdasarkan tanggal bimbingan/nama/kelas/keterangan"
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
                    <th scope="col">@sortablelink('keterangan', 'Keterangan')</th>
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
                    <td>{{ $item->keterangan}}</td>
                    <td>
                        <a href="tanggapibimbingan/{{$item->id}}" class="fas fa-eye"></a>
                        <a href="delete-bimbinganadmin/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Bimbingan Siswa?');"  class="fas fa-trash"></a>
                        {{-- <label for="checkbox1" class="form-check-label ">
                            <input type="checkbox" name="nama[]">
                        </label> --}}
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
