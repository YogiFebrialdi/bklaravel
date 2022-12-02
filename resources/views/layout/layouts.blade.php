<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BKWEB</title>
  <link rel="shortcut icon" href="{{ asset('template/dist/img/smk.png') }}" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}



  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      @if (auth()->user()->level=="guru")
      <li class="nav-item">
        <a class="nav-link" data-widget="profile" href="profile" role="button">
            <i class="nav-icon fas fa-user"></i>
        </a>
      </li>
      @endif
      @if (auth()->user()->level=="siswa")
      <li class="nav-item">
        <a class="nav-link" data-widget="profile" href="profile" role="button">
            <i class="nav-icon fas fa-user"></i>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" data-widget="log-out" href="logout" role="button">
            <i class='fas fa-sign-out-alt'></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="{{ asset('template/dist/img/smk.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BKWEB DAMAY</span>
    </div>

 <!-- Sidebar -->
 <div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
  </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

     {{-- DASHBOARD ADMIN --}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (auth()->user()->level=="admin")
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="dashboard">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard Admin
              </p>
            </a>
          </li>
          @endif


          @if (auth()->user()->level=="admin")
          <li class="nav-item">
            <a class="nav-link {{ Request::is('datasiswa') ? 'active' : '' }}" href="datasiswa">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data siswa
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          @endif


          @if (auth()->user()->level=="admin")
          <li class="nav-item">
            <a class="nav-link {{ Request::is('pelanggaran') ? 'active' : '' }}" href="pelanggaran">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pelanggaran
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('kategori') ? 'active' : '' }}" href="kategori">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Pelanggaran</p>
                </a>
            </li>
            @endif


            @if (auth()->user()->level=="admin")
            <li class="nav-item">
                <a class="nav-link {{ Request::is('benpel') ? 'active' : '' }}" href="benpel">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bentuk Pelanggaran</p>
                </a>
            </li>
            @endif


            @if (auth()->user()->level=="admin")
            <li class="nav-item">
                <a class="nav-link {{ Request::is('sanksi') ? 'active' : '' }}" href="sanksi">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sanksi Pelanggaran</p>
                </a>
            </li>
            </ul>
          </li>
          @endif


          @if (auth()->user()->level=="admin")
          <li class="nav-item">
            <a class="nav-link {{ Request::is('kelas') ? 'active' : '' }}" href="kelas">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                kelas
              </p>
            </a>
            </li>
            @endif


            {{-- @if (auth()->user()->level=="admin")
            <li class="nav-item">
                <a class="nav-link {{ Request::is('akunsiswa') ? 'active' : '' }}" href="/akunsiswa">
                <i class="nav-icon fas fa-user"></i>
                <p>
                 Akun Siswa
                </p>
                </a>
            </li>
            @endif --}}


            @if (auth()->user()->level=="admin")
            <li class="nav-item">
                <a class="nav-link {{ Request::is('akunguru') ? 'active' : '' }}" href="akunguru">
                <i class="nav-icon fas fa-users"></i>
                <p>
                 Akun Guru
                </p>
                </a>
            </li>
            @endif

            @if (auth()->user()->level=="admin")
            <li class="nav-item">
                <a class="nav-link {{ Request::is('bimbinganadmin') ? 'active' : '' }}" href="bimbinganadmin">
                <i class="nav-icon fas fa-book"></i>
                <p>
                     Data Bimbingan
                </p>
                </a>
            </li>
            @endif

            @if (auth()->user()->level=="admin")
            <li class="nav-item">
                <a class="nav-link {{ Request::is('historypelanggaran') ? 'active' : '' }}" href="historypelanggaran">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    History Pelanggaran
                  </p>
                </a>
                </li>
                @endif

                {{-- DASHBOARD GURU --}}
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->

                           @if (auth()->user()->level=="guru")
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="dashboard">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                            Dashboard Guru
                          </p>
                        </a>
                      </li>
                      @endif

                      @if (auth()->user()->level=="guru")
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('inputpelanggaran') ? 'active' : '' }}" href="inputpelanggaran">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                            Input Pelanggaran
                            <span class="right badge badge-danger"></span>
                          </p>
                        </a>
                      </li>
                      @endif

                      @if (auth()->user()->level=="guru")
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('lihat-sanksi') ? 'active' : '' }}" href="lihat-sanksi">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                            Sanksi Pelanggaran
                            <span class="badge badge-info right"></span>
                          </p>
                        </a>
                      </li>
                      @endif

                        @if (auth()->user()->level=="guru")
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('daftarsiswa') ? 'active' : '' }}" href="daftarsiswa">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                             Daftar Siswa
                            </p>
                            </a>
                        </li>
                        @endif


                        @if (auth()->user()->level=="guru")
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('historypelanggaran') ? 'active' : '' }}" href="historypelanggaran">
                              <i class="nav-icon fas fa-chart-pie"></i>
                              <p>
                                History Pelanggaran
                              </p>
                            </a>
                        </li>
                        @endif

                    {{-- DASHBOARD SISWA --}}
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->

                           @if (auth()->user()->level=="siswa")
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="dashboard">
                          <i class="nav-icon fas fa-home"></i>
                          <p>
                            Dashboard Siswa
                          </p>
                        </a>
                      </li>
                      @endif


                      @if (auth()->user()->level=="siswa")
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('bimbingansiswa') ? 'active' : '' }}" href="bimbingansiswa">
                          <i class="nav-icon fas fa-tag"></i>
                          <p>
                            Bimbingan Siswa
                          </p>
                        </a>
                        </li>
                        @endif
{{--
                        @if (auth()->user()->level=="siswa")
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('lihatbimbingan') ? 'active' : '' }}" href="lihatbimbingan">
                          <i class="nav-icon fas fa-tag"></i>
                          <p>
                            Lihat Bimbingan
                          </p>
                        </a>
                        </li>
                        @endif --}}


                        @if (auth()->user()->level=="siswa")
                        <li class="nav-item">
<<<<<<< HEAD
                          <a href="historypelanggaransiswa" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                              History Pelanggaran
                            </p>
                          </a>
=======
                            <a class="nav-link {{ Request::is('datapelanggaran') ? 'active' : '' }}" href="datapelanggaran">
                              <i class="nav-icon fas fa-chart-pie"></i>
                              <p>
                                Data Pelanggaran
                              </p>
                            </a>
>>>>>>> df2a529e8ba7cc112d0aa55b865966d5c9b8b95c
                        </li>
                        @endif

                        @if (auth()->user()->level=="siswa")
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('sanksi-siswa') ? 'active' : '' }}" href="sanksi-siswa">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                              Sanksi Pelanggaran
                              <span class="badge badge-info right"></span>
                            </p>
                          </a>
                        </li>
                        @endif


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">BKWEB</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('template/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/dist/js/pages/dashboard2.js') }}"></script>
<!-- email -->
{{-- <link rel="stylesheet" href="{{ asset/app.css }}">
    <script src="{{ asset('ks/app.js')}}"></script> --}}

<!--emailibrary!>
        <link rel="stylesheet" href="{{ url('css/app.css') }}" />

</body>
</html>
