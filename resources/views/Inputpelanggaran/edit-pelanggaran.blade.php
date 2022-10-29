@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pelanggaran Siswa</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Tambah Pelanggaran Siswa</h3>
            </div>

        <div class="card-body">
           <form action="/update-pelanggaran/{{$data->id}}" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Siswa">
            </div>
            <div class="form-group">
                <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas">
            </div>
            <div class="form-group">
                <select class="form-control" name="bentukpelanggaran" arial-label="Default control example">
                    <option selected>Pilih Bentuk Pelanggaran</option>
                    <option value="Bolos">Bolos</option>
                    <option value="Bullying">Bullying</option>
                    <option value="Berantem">Berantem</option>
                    <option value="Melawanguru">Melawan Guru</option>
                    <option value="Mencuri">Mencuri</option>
                    <option value="Narkoba">Narkoba</option>
                    <option value="Pakaiantidakrapih">Pakaian Tidak Rapih</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="bobot" name="bobot" class="form-control" placeholder="Bobot">
            </div>
            <div class="form-group">
                <input type="text" id="oleh" name="oleh" class="form-control" placeholder="Oleh">
            </div>
            <div class="form-group">
                <input type="date" id="ttl" name="ttl" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan Pelanggaran</button>
            </div>
        </div>
    </div>

  @endsection

