@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-12 col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap aligin-items-center pt-3 pb-2 mb-3 border-bottom" role="profile">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="card-body">
                                <table border="1" cellpadding="10" cellspacing="0" width="100%">
                                    <tr>
                                        <td>NIS</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->siswa->nis }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->siswa->kelas->kelas }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->siswa->jk }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->siswa->ttl }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->siswa->alamat }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Wali Murid</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->siswa->walimurid }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td class="text-center">:</td>
                                        <td>
                                            {{ Auth::user()->siswa->telepon }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
