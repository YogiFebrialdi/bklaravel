@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kelas</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Tambah Data Kelas</h3>
            </div>

        <div class="card-body">
           <form action="simpan-kelas" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan Data</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
