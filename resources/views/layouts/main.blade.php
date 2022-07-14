<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>
    {{ config('app.name', $company_name) }} | {{ auth()->user()->name ?? $title }}
  </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('./assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('./assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('./assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('./assets/plugins/summernote/summernote-bs4.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Favicon-->
  <link rel="shortcut icon" type="image/jpg" href="{{ asset('./assets/images/favicon.jpeg') }}"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-primary"> 

     <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item bg-light d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
      @can('is-admin')
      <li class="nav-item bg-warning d-none d-sm-inline-block">
        <a href="{{ route('system_logs') }}" class="nav-link">System Logs</a>
      </li>
      <li class="nav-item bg-lime d-none d-sm-inline-block">
        <a target="blank" href="{{ url('admin/log-reader') }}" class="nav-link">Log Reader</a>
      </li>
      @endcan
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <form method="post" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-default btn-sm">
            <span class="fas fa-arrow-right"></span>
            Logout
          </button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('./assets/images/logo.png') }}" alt="TIFA Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') ?? '' }}</span>
    </a>

    @include('partials.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-1">
            <a class="btn btn-warning" href="{{ url()->previous() }}">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
          <div class="col-sm-7">
            <h1 class="m-0 text-dark">{{ $header ?? '' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Incentives</a></li>
              <li class="breadcrumb-item active">{{ $header ?? '' }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @include('partials.alerts')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   @yield('content')
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a class="text-warning" href="http://tifaresearch.com/">{{ $company_name ?? '' }}</a>.</strong>
    All rights reserved.
    @env('local')
    <div class="float-right d-none d-sm-inline-block">
      <b>Laravel Version</b> {{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
    @endenv
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('./assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('./assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('./assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('./assets/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('./assets/dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('./assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('./assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('./assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('./assets/plugins/chart.js/Chart.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('./assets/plugins/summernote/summernote-bs4.min.js') }}"></script>


<!-- PAGE SCRIPTS -->
<script src="{{ asset('./assets/dist/js/pages/dashboard2.js') }}"></script>

<!-- Summernote script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
</body>
</html>
