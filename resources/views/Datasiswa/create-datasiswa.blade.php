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
                <h3>Tambah Data Siswa</h3>
            </div>

        <div class="card-body">
           <form action="simpan-datasiswa" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="nis" name="nis" class="form-control" placeholder="Nis Siswa">
            </div>
            <div class="form-group">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Siswa">
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Siswa">
            </div>
            <div class="form-group">
                <select class="form-control" name="kelas_id" arial-label="Default control example">
                    <option selected>Pilih Kelas</option>
                    @foreach ($kelas as $item)
                    <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">

                <select class="form-control" name="jk" arial-label="Default control example">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" id="ttl" name="ttl" class="form-control">
            </div>
            <div class="form-group">
                <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
            </div>
            <div class="form-group">
                <input type="text" id="walimurid" name="walimurid" class="form-control" placeholder="Walimurid Siswa">
            </div>
            <div class="form-group">
                <input type="text" id="telepon" name="telepon" class="form-control" placeholder="No Tel Walimurid">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan Data</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
