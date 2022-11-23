@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bentuk Pelanggaran</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Edit Bentuk Pelanggaran</h3>
            </div>

        <div class="card-body">
           <form action="/update-benpel/{{$data->id}}" method="post">
            {{ csrf_field () }}
            <div class="form-group">
              <select class="form-control" name="kategori_id" arial-label="Default control example">
                  <option selected>Pilih Kategori</option>
                  @foreach ($kategori as $item)
                  <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                  @endforeach
              </select>
          </div>
            <div class="form-group">
                <input type="text" id="benpel" name="benpel" class="form-control" placeholder="Bentuk Pelanggaran" value="{{ $data->benpel}}">
            </div>
            <div class="form-group">
                <input type="text" id="bobot" name="bobot" class="form-control" placeholder="Bobot" value="{{ $data->bobot}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan Data</button>
            </div>
           </form>
        </div>
    </div>

  @endsection
