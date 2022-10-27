@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sanksi</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Edit Sanksi</h3>
            </div>

        <div class="card-body">
           <form action="/update-sanksi/{{$data->id}}" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="kriteria" name="kriteria" class="form-control" placeholder="Kriteria">
            </div>
            <div class="form-group">
                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
            </div>
            <div class="form-group">
                <input type="text" id="bobot" name="bobot" class="form-control" placeholder="Bobot">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
