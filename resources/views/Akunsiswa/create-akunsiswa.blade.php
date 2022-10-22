@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Akun Siswa</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Tambah Akun Siswa</h3>
            </div>

        <div class="card-body">
           <form action="simpan-akunsiswa" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Siswa">
            </div>
            <div class="form-group">
                <select class="form-control" name="level" arial-label="Default control example">
                    <option selected>Level</option>
                    <option value="Siswa">Siswa</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
                <input type="text" id="password" name="password" class="form-control" placeholder="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan Akun</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
