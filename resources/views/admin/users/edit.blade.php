@php $show_birthdate = true; @endphp
@extends('admin.layouts.master')
@section('title','Kaydı Güncelle')
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
            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $message }}
              </div>
            @endif
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Kaydı Güncelle</h3>
              </div>
              <form action="{{ route('admin.users.update',$user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">İsim</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" placeholder="Ad Soyad" value="{{ $user->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputTcKimlik">T.C. Kimlik No</label>
                    <input type="text" class="form-control @error('tckimlik') is-invalid @enderror" id="inputTcKimlik" name="tckimlik" placeholder="T.C. Kimlik Numarası" pattern="[0-9]{11}" value="{{ $user->tckimlik }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone">Telefon</label>
                    <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="05xxxxxxxxx" pattern="[0]{1}[5]{1}[0-9]{9}" value="{{ $user->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="inputBirthDate">Doğum Tarihi</label>
                    <input type="text" class="form-control" id="inputBirthDate" name="birthdate" value="{{ $user->birthdate }}">
                  </div>
                  <div class="form-group">
                    <label for="inputDiagnostic">Metabolik Hastalık Tanısı</label>
                    <input type="text" class="form-control" id="inputDiagnostic" name="diagnostic" value="{{ $user->diagnostic }}">
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
                  <a href="{{ route('admin.users.index') }}"><div class="btn btn-default">Vazgeç</div></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
