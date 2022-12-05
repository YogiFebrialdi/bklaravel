@php
    use Carbon\Carbon;
@endphp

@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bimbingan Siswa</h1>
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
                            CARI Bimbingan
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="cari" id="cari" class="form-control" placeholder="cari data berdasarkan tanggal/bimbingan"
                            autofocus="true" value="{{ $cari}}">
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Bimbingan
                </button>
                <br><br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th width="30%">Bimbingan</th>
                            <th width="20%">Tanggapan</th>
                            <th scope="col" class="text-center">@sortablelink('keterangan', 'Keterangan')</th>
                            <th scope="col" class="text-center">@sortablelink('tglbim', 'Tanggal Bimbingan')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1 + (($data->currentPage()-1) * $data->perPage());
                        @endphp
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $item->bimbingan}}</td>
                            <td>
                                @if ($item->tanggapan == NULL)
                                    <i>
                                        Belum Direspon
                                    </i>
                                @else
                                    {{ $item->tanggapan }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($item->status == 0)
                                    <span class="badge badge-danger">
                                        Belum Ditanggapi
                                    </span>
                                @elseif($item->status == 1)
                                    <span class="badge badge-success">
                                        Sudah Ditanggapi
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ Carbon::createFromFormat("Y-m-d", $item->tanggal_bimbingan)->isoFormat('D MMMM Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <strong>
                                    <i>
                                        Oopss.. Sepertinya Anda Belum Melakukan Bimbingan
                                    </i>
                                </strong>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <!-- {{ $data->links() }} -->
                {!! $data->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-plus"></i> Tambah Data Bimbingan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/bimbingansiswa') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bimbingan"> Bimbingan </label>
                        <textarea name="bimbingan" class="form-control" id="bimbingan" rows="5" placeholder="Masukkan Data Bimbingan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-sm">
                        Kembali
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

@endsection
