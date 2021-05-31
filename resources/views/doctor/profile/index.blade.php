@extends('doctor.layouts.master')
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
              <form action="{{ route('doctor.profile.update',Auth::guard('doctor')->user()->id) }}" method="post">
                @csrf
                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      There were some problems:<br>
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <div class="form-group">
                    <label for="inputName">İsim</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Ad Soyad" value="{{ Auth::guard('doctor')->user()->name }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="inputBranch">Birim</label>
                    <input type="text" class="form-control" id="inputBranch" name="branch" placeholder="Birimi" value="{{ Auth::guard('doctor')->user()->branch }}">
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">E-posta</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" placeholder="E-posta adresi" value="{{ Auth::guard('doctor')->user()->email }}" required>
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
