@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Input Pelanggaran</h1>
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
                        <th scope="col">Aksi</th>
                    </tr>
                    @php
                    $no = 1 + (($data->currentPage()-1) * $data->perPage());
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="item">{{ $no++}}</th>
                        <td>{{ $item->nis}}</td>
                        <td>{{ $item->user->name}}</td>
                        <td>{{ $item->kelas->kelas}}</td>
                        <td>
                            <a href="create-pelanggaran/{{$item->id}}" class="btn btn-success">Tambah Pelanggaran <i class="fas fa-plus-square"></i></a>
                        </td>
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
