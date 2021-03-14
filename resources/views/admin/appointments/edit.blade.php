@php $show_date = true; @endphp
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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Kaydı Güncelle</h3>
              </div>
              <form action="{{ route('admin.appointments.update',$appointment->id) }}" method="post">
                @csrf
                @method('PUT')
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
                    <label for="inputDoctorEmail">Doktor E-postası</label>
                    <input type="email" class="form-control @error('doctor_email') is-invalid @enderror" id="inputDoctorEmail" name="doctor_email" placeholder="Doktorun E-postası" value="{{ \App\Models\Doctor::where('id', $appointment->doctor_id)->value('email') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPatientTc">Hasta T.C. Kimlik No</label>
                    <input type="text" class="form-control @error('user_tc') is-invalid @enderror" id="inputPatientTc" name="user_tc" placeholder="Hastanın T.C. Kimlik No'su" value="{{ \App\Models\User::where('id', $appointment->user_id)->value('tckimlik') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAppointmentDate">Randevu Tarihi</label>
                    <input type="text" class="form-control @error('appt_date') is-invalid @enderror" id="inputAppointmentDate" name="appt_date" value="{{ $appointment->appt_date }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAppointmentStatus">Randevu Durumu</label>
                    <select class="form-control custom-select" id="inputAppointmentStatus" name="appt_status">
                      <option selected>Normal</option>
                      <option>İptal</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputAppointmentDetail">Randevu Notları</label>
                    <textarea class="form-control" id="inputAppointmentDetail" name="appt_detail" rows="4">{{ $appointment->appt_detail }}</textarea>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Güncelle</button>
                  <a href="{{ route('admin.appointments.index') }}"><div class="btn btn-default">Vazgeç</div></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
