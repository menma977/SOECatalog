<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>DOGE Boost</title>
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
  <meta content='{{ asset('images/favicon.ico') }}' property='og:image'/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon icon -->
  <link rel="shortcut icon" href="{{ asset('dist/img/logo.jpg') }}" type="image/x-icon">
  <!-- Theme Style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
  @yield('addCss')
</head>
<body class="sidebar-mini">
<div id="app" class="wrapper">
  <!-- header -->
  <x-header-layout/>
  <!-- /.header -->

  <!-- sidebar -->
  <x-sidebar-layout/>
  <!-- /sidebar -->

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        @yield('title')
      </div>
    </section>

    <section class="content">
      @yield('content')
    </section>
  </div>

  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1 BETA
    </div>
    <strong>Copyright &copy; 2020 <a href="#">DOGE Boost</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
@yield('addJs')
</body>
</html>
