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
                    <h1 class="m-0">Data Bimbingan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools">
                </div>
            </div>
            @if ($message = Session:: get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif

            <form method="GET">
                <div class="card-header">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">
                            CARI BIMBINGAN SISWA
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="cari" id="cari" class="form-control" placeholder="cari data berdasarkan tanggal bimbingan/nama/keterangan"
                            autofocus="true" value="{{ $cari}}">
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">NO.</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <th scope="col" class="text-center">@sortablelink('keterangan', 'Keterangan')</th>
                            <th scope="col" class="text-center">@sortablelink('tglbim', 'Tanggal Pengajuan Bimbingan')</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1 + (($data->currentPage()-1) * $data->perPage());
                        @endphp
                        @forelse ($data as $item)
                        <tr>
                            <th scope="item" class="text-center">{{ $no++}}.</th>
                            <td>{{ $item->siswa->user->name }}</td>
                            <td class="text-center">{{ $item->siswa->kelas->kelas}}</td>
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
                            <td class="text-center">
                                <a href="/tanggapibimbingan/{{$item->id}}" class="fas fa-eye"></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <i>
                                    Data Tidak Ada
                                </i>
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
@endsection
