@php $show_birthdate = true; @endphp
@extends('user.layouts.master')
@section('title','Profili Güncelle')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>

    <script type='text/javascript'>
      function generatePassword() {
        var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
          retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
      }
      function generate() {
        var input = document.getElementById("inputPassword");
        input.setAttribute('value', generatePassword());
      }
    </script>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $message }}
              </div>
            @endif
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Profili Güncelle</h3>
              </div>
              <form action="{{ route('user.profile.update',Auth::guard('user')->user()->id) }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">İsim</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Ad Soyad" value="{{ Auth::guard('user')->user()->name }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="inputTcKimlik">T.C. Kimlik No</label>
                    <input type="text" class="form-control" id="inputTcKimlik" placeholder="T.C. Kimlik Numarası" pattern="[0-9]{11}" value="{{ Auth::guard('user')->user()->tckimlik }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone">Telefon</label>
                    <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="05xxxxxxxxx" pattern="[0]{1}[5]{1}[0-9]{9}" value="{{ Auth::guard('user')->user()->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="inputBirthDate">Doğum Tarihi</label>
                    <input type="text" class="form-control" id="inputBirthDate" name="birthdate" value="{{ Auth::guard('user')->user()->birthdate }}">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Parola</label>
                    <div class="input-group">
                      <input type="text" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" placeholder="Parola">
                      <div class="input-group-append">
                        <button type="button" class="btn btn-primary" onclick="generate()">Şifre Üret</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Güncelle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
