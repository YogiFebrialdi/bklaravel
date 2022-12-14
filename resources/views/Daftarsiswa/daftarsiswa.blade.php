@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Siswa</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
            </div>
            @if ($message = Session:: get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif

            <div class="card-header">
                <form method="GET">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">
                            CARI SISWA
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="cari" id="cari" class="form-control" placeholder="cari data berdasarkan nama/nim"
                            autofocus="true" value="{{ $cari}}">
                        </div>
                    </div>
                </form>
            </div>


            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">@sortablelink('nis', 'NIS')</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th width="30%">Alamat</th>
                        <th scope="col">Walimurid</th>
                        <th scope="col">Telepon</th>
                    </tr>
                    @php
                    $no = 1 + (($data->currentPage()-1) * $data->perPage());
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="item">{{ $no++}}</th>
                        <td>{{ $item->nis}}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->kelas->kelas}}</td>
                        <td>{{ $item->jk}}</td>
                        <td>{{date('d-m-Y', strtotime($item->ttl)) }}</td>
                        <td>{{ $item->alamat}}</td>
                        <td>{{ $item->walimurid}}</td>
                        <td>{{ $item->telepon}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                <!-- {{ $data->links() }} -->
                {!! $data->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
