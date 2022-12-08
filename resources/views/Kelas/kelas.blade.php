@php
    use App\Models\Datasiswa;
    use App\Models\Historypelanggaran;
    use App\Models\Benpel;
@endphp

@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kelas</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools">
                    <a href="create-kelas" class="btn btn-success">Tambah Data Kelas <i class="fas fa-plus-square"></i></a>
                </div>
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
                            CARI KELAS
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="cari" id="cari" class="form-control" placeholder="cari data berdasarkan kelas"
                            autofocus="true" value="{{ $cari}}">
                        </div>
                    </div>
                </form>
            </div>


            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">@sortablelink('kelas', 'KELAS')</th>
                        <th scope="col" class="text-center">SISWA</th>
                        <th scope="col" class="text-center">@sortablelink('pelanggaran', 'PELANGGARAN')</th>
                        <th scope="col" class="text-center">@sortablelink('poin', 'POIN')</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    @php
                    $no = 1 + (($data->currentPage()-1) * $data->perPage());
                    @endphp

                    @foreach ($data as $item)
                    @php
                        $count_siswa = Datasiswa::where("kelas_id", $item->id)->count();

                        $count_pelanggaran = Historypelanggaran::where("kelas", $item->kelas)->count("benpel_id");

                        $benpel = Historypelanggaran::where("kelas", $item->kelas)->get();

                        $bobot = 0;
                        foreach ($benpel as $b) {
                            $benpel_data = Benpel::where("id", $b->benpel_id)->get();

                            foreach ($benpel_data as $d) {
                                $bobot += $d->bobot;
                            }
                        }
                    @endphp
                    <tr>
                        <th scope="item">{{ $no++}}</th>
                        <td>{{ $item->kelas}}</td>
                        <td class="text-center">{{ $count_siswa }}</td>
                        <td class="text-center">{{ $count_pelanggaran }}</td>
                        <td class="text-center">{{ $bobot }}</td>
                        <td>
                            <a href="edit-kelas/{{$item->id}}" class="btn btn-info">Edit</a>
                            <a href="delete-kelas/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Kelas?');"  class="btn btn-danger">Delete</a>
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
