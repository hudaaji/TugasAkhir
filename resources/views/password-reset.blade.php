<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suryani Catering</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
  <div class="login-logo">
    Form Lupa Password </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
    @endif
    <div class="card-body login-card-body">
      <p class="login-box-msg"><strong>Masukan Password Baru</strong></p>

      <form action="{{route('PasswordBaru')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" value="{{$otp->email}}" name="email">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        <span id="password-match-text"></span>
        <div class="row">
              <div class="col-12">
                <button type="submit" id="submit" class="btn btn-outline-primary float-right">Kirim</button>
              </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('css/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('css/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
<script>
$(document).ready(function () {
    $("#password, #password2").keyup(checkPasswordMatch);

    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#password2").val();
        var button = document.getElementById("submit");

        if (password != confirmPassword){
            $("#password-match-text").html("Passwords do not match!");
            button.disabled = true;
        }
        else{
            $("#password-match-text").html("Passwords match.");
            button.disabled = false;
        }
    }
});
</script>

