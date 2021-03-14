@extends('user.layouts.master')
@section('title','BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORM ÖZETİ')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORM ÖZETİ</h3>
              </div>
              @php
                $user_id = \App\Models\Appointment::where('id', $id)->value('user_id');
                $doctor_id = \App\Models\Appointment::where('id', $id)->value('doctor_id');
              @endphp
              <div class="card-body">
                <h3>Özet</h3>
                <p style="text-align:justify;">Onam formu bilgileri kaydedilmiştir. Görüşmeye katılabilirsiniz.</p>
              </div>
              <div class="card-footer text-right clearfix">
                <a href="https://metabolizmateletip.ankara.edu.tr:44444/{{ $room_name }}" class="btn btn-primary">Görüşmeye Katıl</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
