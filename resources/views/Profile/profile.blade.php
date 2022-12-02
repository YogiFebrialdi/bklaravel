@extends('layout.layouts')

@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-12 col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
          </div>

          {{-- @if (auth()->user()->name:: get('success'))
                        <div class="profile">
                          <a href="profile" class="profile">
                          </a>
                        </div>
                        @endif  --}}

            @if (auth()->user()->name:: get('success'))
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap aligin-items-center pt-3 pb-2 mb-3 border-bottom" role="profile">
                  {{ auth()->user->name }}
                </div>
            @endif
          
             {{-- @if ($message = Session:: get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
        @endif  --}}

              <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                    @php
                      $no = 1 + (($data->currentPage()-1) * $data->perPage());
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->email}}</td>
                        <td>{{ $item->password}}</td>
                    </tr>
                    @endforeach
                </table>
                </div>


        </div>
      </div>
    </div>
    </div>
  </div>
</div> 
@endsection
