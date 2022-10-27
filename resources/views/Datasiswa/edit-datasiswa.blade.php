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
                <h3>Edit Data Siswa</h3>
            </div>

        <div class="card-body">
           <form action="/update-datasiswa/{{$data->id}}" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="nisn" name="nisn" class="form-control" placeholder="Nis Siswa" value="{{ $data->nisn}}">
            </div>
            <div class="form-group">
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Siswa" value="{{ $data->nama}}">
            </div>
            <div class="form-group">
                <select class="form-control" name="kelas" arial-label="Default control example">
                    <option selected>{{ $data->kelas}}</option>
                    <option value="X TKJ">X TKJ</option>
                    <option value="XI TKJ">XI TKJ</option>
                    <option value="XII TKJ">XII TKJ</option>
                    <option value="X RPL">X RPL</option>
                    <option value="XI RPL">XI RPL</option>
                    <option value="XII RPL">XII RPL</option>
                    <option value="X JB">X JB</option>
                    <option value="XI JB">XI JB</option>
                    <option value="XII JB">XII JB</option>
                    <option value="X TAB">X TAB</option>
                    <option value="XI TAB">XI TAB</option>
                    <option value="XII TAB">XII TAB</option>
                    <option value="X NKPI">X NKPI</option>
                    <option value="XI NKPI">XI NKPI</option>
                    <option value="XII NKPI">XII NKPI</option>
                    <option value="X TPHP">X TPHP</option>
                    <option value="XI TPHP">XI TPHP</option>
                    <option value="XII TPHP">XII TPHP</option>
                    <option value="X BP">X BP</option>
                    <option value="XI BP">XI BP</option>
                    <option value="XII BP">XII BP</option>
                </select>
            </div>
            <div class="form-group">

                <select class="form-control" name="jk" arial-label="Default control example" >
                    <option selected>{{ $data->jk}}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" id="ttl" name="ttl" class="form-control" value="{{ $data->ttl}}">
            </div>
            <div class="form-group">
                <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat" >{{ $data->alamat}}</textarea>
            </div>
            <div class="form-group">
                <input type="text" id="walimurid" name="walimurid" class="form-control" placeholder="Walimurid Siswa" value="{{ $data->walimurid}}">
            </div>
            <div class="form-group">
                <input type="text" id="telepon" name="telepon" class="form-control" placeholder="No Tel Walimurid" value="{{ $data->telepon}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
