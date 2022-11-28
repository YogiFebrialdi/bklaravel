@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Bimbingan</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="card card-info card-outline">
          <div class="card-header">
      </div>
 <!-- Main content -->
 <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          </div>

            <div class="card-body">
                <form action="simpan-bimbingansiswa" method="post">
                    {{ csrf_field () }}
                    <div class="form-group">
                        <input type="date" id="tglbim" name="tglbim" class="form-control" placeholder="Tanggal Bimbingan">
                    </div>
                    <div class="form-group">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas">
                    </div>
                    <div class="form-group">
                        <textarea id="bimbingan" name="bimbingan" class="form-control" placeholder="Bimbingan"></textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="keterangan" arial-label="Default control example">
                            <option selected>Keterangan</option>
                            <option value="Belum Ditanggapi">Belum Ditanggapi</option>
                        </select>
                    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
            </form>
             </div>
              </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
@endsection
