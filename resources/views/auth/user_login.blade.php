<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'TELETIP') }} | Giriş</title>
  <link rel="icon" href="{{asset('/')}}favicon.ico">

  <link rel="stylesheet" href="{{asset('/')}}plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/home') }}" style="text-align:center;font-size:3.5rem;">TELE<b>TIP</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Oturum açın</p>
@if ($errors->any()) @foreach ($errors->all() as $error)

      <p class="text-danger">{{ $error }}</p>@endforeach @endif

      <form action="{{ route('user.login.submit') }}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="tckimlik" placeholder="T.C. Kimlik No" value="{{ old('tckimlik') }}" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Parola" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Beni hatırla
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Giriş</button>
          </div>
        </div>
      </form>
@if (Route::has('user.password.request'))

      <p class="mb-1">
        <a href="{{ route('user.password.request') }}">Şifremi Unuttum</a>
      </p>@endif

    </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}dist/js/adminlte.min.js"></script>
</body>
</html>
