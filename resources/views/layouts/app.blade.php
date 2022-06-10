<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ str_replace('_', '', config('app.name', 'Laravel')) }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('dist/css/ionicons.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Additional CSS -->
    @yield('additionalStyle')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('dist/css/googleFont.css') }}">
    <!-- Preloader -->
    <style type="text/css">
       .preloader {
            /*display: none;*/
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('{{ asset('dist/img/preloader.gif')}}') no-repeat rgb(0,0,0);
            /*background-size: 10% 10%;*/
            background-position: center;
            opacity: .35;
        }
    </style>

</head>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
{{-- <body class="hold-transition skin-blue sidebar-collapse fixed sidebar-mini"> --}}
<body class="hold-transition sidebar-mini layout-fixed text-sm">
{{-- Preloader --}}
<div class="preloader"></div>
<!-- Site wrapper -->
<div class="wrapper">

  @include('layouts.navbar')

  <!-- =============================================== -->
  @include('layouts.sidebar')
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.contentHeader')

    <!-- Main content -->
    <section class="content" id="idMainContent">
      <!-- Default box -->
      @yield('content')
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  {{-- </aside> --}}
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Additional Script -->
@yield('additionalScript')
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<script type="text/javascript">
    /** Preloader */
    $(window).on('load', function(){
        $('.preloader').fadeOut();
    });
    /** add active class and stay opened when selected */
    var url = window.location;
    // for treeview
    $('ul.nav-treeview a').filter(function() {
    return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open');

    $('li.nav-item a').filter(function() {
    return this.href == url;
    }).addClass('active');
  
</script>

@yield('scriptJS')

</body>
</html>
