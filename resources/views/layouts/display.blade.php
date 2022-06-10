
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Template</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
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
         opacity: .8;
     }
 </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="preloader"></div>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-info">
    <div class="container">
      <a href="{{url('')}}" class="navbar-brand">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"> Template </span>
      </a>
      
      <!-- Right navbar links -->
      <div class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        Terakhir Update : {{date('d-M-Y H:i:s')}} 
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Top Navigation <small>Example 3.0</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">

                @yield('content')

            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script type="text/javascript">
  /** Preloader */
  $(window).on('load', function(){
      $('.preloader').fadeOut();
  });
</script>

@yield('scriptJS')

</body>
</html>
