@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Input Pelanggaran Siswa</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Tambah Pelanggaran</h3>
            </div>

        <div class="card-body">
           <form action="simpan-historypelanggaran" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Siswa">
            </div>
            <div class="form-group">
                <select class="form-control" name="kelas" arial-label="Default control example">
                    <option selected>Pilih Kelas</option>
                    @foreach ($kelas as $item )
                    <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="benpel" arial-label="Default control example">
                    <option selected>Pilih Bentuk Pelanggaran</option>
                    @foreach ($benpel as $item )
                    <option value="{{ $item->id }}">{{ $item->benpel }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="bobot" arial-label="Default control example">
                    <option selected>Pilih Bobot</option>
                    @foreach ($benpel as $item )
                    <option value="{{ $item->id }}">{{ $item->bobot }}</option>
                    @endforeach
                </select>
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
           </form>
        </div>
    </div>

  @endsection
