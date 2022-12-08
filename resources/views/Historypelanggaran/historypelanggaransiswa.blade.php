@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">History Pelanggaran Siswa</h1>
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
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NIS</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">KELAS</th>
                        <th scope="col">Bentuk Pelanggaran</th>
                        <th scope="col" class="text-center">Bobot</th>
                        <th scope="col">Oleh</th>
                        <th scope="col" class="text-center">Tanggal Pelanggaran</th>
                    </tr>
                    @php
                    $no = 1 + (($data->currentPage()-1) * $data->perPage());
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="item">{{ $no++}}</th>
                        <td>{{ $item->siswa->nis}}</td>
                        <td>{{ $item->siswa->user->name}}</td>
                        <td>{{ $item->kelas}}</td>
                        <td>{{ $item->benpel->benpel}}</td>
                        <td class="text-center">{{ $item->benpel->bobot}}</td>
                        <td>{{ $item->user->name }}</td>
                        <td class="text-center">{{ $item->tgl}}</td>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection


