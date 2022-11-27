@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lihat Bimbingan</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Tanggapi Bimbingan</h3>
            </div>

        <div class="card-body">
           <form action="/update-bimbinganadmin/{{$data->id}}" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ $data->nama}}">
            </div>
            <div class="form-group">
                <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" value="{{ $data->kelas}}">
            </div>
            <div class="form-group">
                <textarea id="bimbingan" name="bimbingan" class="form-control" placeholder="Bimbingan">{{ $data->bimbingan}}</textarea>
            </div>
            <div class="form-group">
                <textarea id="tanggapan" name="tanggapan" class="form-control" placeholder="tanggapan">{{ $data->tanggapan}}</textarea>
            </div>
            <div class="form-group">
                <select class="form-control" name="keterangan" arial-label="Default control example">
                    <option selected>Keterangan</option>
                    <option value="Telah Ditanggapi">Telah Ditanggapi</option>
                </select>
            </div>

{{--
            <td width="20px">
                <label for="checkbox" class="form-check-label ">
                    <input type="checkbox" name="nama[]"> Sudah Ditanggapi
                </label>
                </td> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
