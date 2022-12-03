@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lihat Bimbingan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Tanggapi Bimbingan siswa</h3>
            </div>

            <div class="card-body">
                <form action="/update-bimbinganadmin/{{$data->id}}" method="post">
                    {{ csrf_field () }}
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama" value="{{ $data->siswa->user->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Kelas" value="{{ $data->siswa->kelas->kelas}}" readonly>
                    </div>
                    <div class="form-group">
                        <textarea id="bimbingan" name="bimbingan" class="form-control" placeholder="Bimbingan" rows="5" readonly>{{ $data->bimbingan}}</textarea>
                    </div>
                    <div class="form-group">
                        <textarea id="tanggapan" name="tanggapan" class="form-control" placeholder="tanggapan" rows="5">{{ $data->tanggapan == "NULL" ? '' : $data->tanggapan }}</textarea>
                    </div>
                    <div class="form-group">
                        @if ($data->status == 1)

                        @else
                        <button type="submit" class="btn btn-success">Kirim</button>

                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
