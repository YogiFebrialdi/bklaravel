@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Akun Guru</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Edit Akun Guru</h3>
            </div>

        <div class="card-body">
           <form action="/update-akunguru/{{$data->id}}" method="post">
            {{ csrf_field () }}
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nama Siswa" value="{{ $data->name}}">
            </div>

            <div class="form-group">
                <select class="form-control" name="level" arial-label="Default control example">
                    <option selected>{{ $data->level}}</option>
                    <option value="guru">Guru</option>
                >
            </div>

            <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ $data->email}}">
            </div>

            <div class="form-group">
                <input type="text" id="password" name="password" class="form-control" placeholder="Password" value="{{ $data->password}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
