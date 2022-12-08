@php
use App\Models\Historypelanggaran;
@endphp

@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-th"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data Siswa</span>
                            <span class="info-box-number">
                                {{ $count_siswa }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Guru</span>
                            <span class="info-box-number">{{ $count_guru }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fas fa-tag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kelas</span>
                            <span class="info-box-number">{{ $count_kelas }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="nav-icon fas fa-copy"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pelanggaran</span>
                            <span class="info-box-number">{{ $count_history }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Top 8 Pelanggaran Siswa
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse ($urutkan as $data)
                    @php
                        $history = Historypelanggaran::where("siswa_id", $data->siswa_id)->first();
                    @endphp
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-center">
                                {{ $history->siswa->user->name }}
                                <br><br>
                                {{ $history->siswa->kelas->kelas }}
                            </h6>
                            <hr>
                            Poin Pelanggaran :
                            <span class="float-right text-danger" style="font-size: 20px; font-weight: bold;">
                                {{ $data->total }}
                            </span>
                            <hr>
                            {{-- <button class="btn btn-info btn-block">
                                <a href="historypelanggaransiswa" class="btn btn-info">Lihat Pelanggaran</a>
                            </button> --}}
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        Belum Ada Data
                    </div>
                </div>
                @endforelse
            </div>
<!-- /.card-body -->
<!-- /.card-footer -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>

@endsection
