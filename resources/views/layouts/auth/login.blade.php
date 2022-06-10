<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }} | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('dist/css/ionicons.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('dist/css/googleFont.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>{{ str_replace('_',' ',strtoupper(config('app.name'))) }}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form action="{{ route('login') }}" method="POST">
          @csrf

          <div class="form-group has-feedback">
              @error('username')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" autofocus>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <input type="password" class="form-control" name="password" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="col-xs-4 pull-right">
            <button type="submit" class="btn btn-info btn-block btn-flat">Login</button>
          </div>
            <!-- /.col -->
      </form>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- BackStretch -->
<script src="{{ asset('plugins/backstretch/jquery.backstretch.min.js') }}"></script>

<script type="text/javascript">
  $.backstretch("{{asset('dist/img/photo4.jpg')}}", {speed: 400});
</script>

{{-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script> --}}
</body>
</html>
