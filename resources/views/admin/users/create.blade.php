@php $show_birthdate = true; @endphp
@extends('admin.layouts.master')
@section('title','Hasta Ekle')
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

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hasta Ekle</h3>
              </div>
              <form action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <div class="card-body">@if ($errors->any())

                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    There were some problems:<br>
                    <ul>@foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>@endforeach

                    </ul>
                  </div>@endif

                  <div class="form-group">
                    <label for="inputName">İsim</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" placeholder="Ad Soyad" value="{{ old('name') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputTcKimlik">T.C. Kimlik No</label>
                    <input type="text" class="form-control @error('tckimlik') is-invalid @enderror" id="inputTcKimlik" name="tckimlik" placeholder="T.C. Kimlik Numarası" pattern="[0-9]{11}" value="{{ old('tckimlik') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone">Telefon</label>
                    <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="05xxxxxxxxx" pattern="[0]{1}[5]{1}[0-9]{9}" value="{{ old('phone') }}">
                  </div>
                  <div class="form-group">
                    <label for="inputBirthDate">Doğum Tarihi</label>
                    <input type="text" class="form-control" id="inputBirthDate" name="birthdate" value="{{ old('birthdate') }}">
                  </div>
                  <div class="form-group">
                    <label for="inputDiagnostic">Hastanın Metabolik Hastalık Tanısı</label>
                    <input type="text" class="form-control" id="inputDiagnostic" name="diagnostic" value="{{ old('diagnostic') }}">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Parola</label>
                    <div class="input-group">
                      <input type="text" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" placeholder="Parola" required>
                      <div class="input-group-append">
                        <button type="button" class="btn btn-primary" onclick="generate()">Şifre Üret</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Gönder</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
