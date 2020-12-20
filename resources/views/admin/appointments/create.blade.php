@php $show_date = true; @endphp
@extends('admin.layouts.master')
@section('title','Randevu Ekle')
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

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Randevu Ekle</h3>
              </div>
              <form action="{{ route('admin.appointments.store') }}" method="post">
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
                    <label for="inputDoctorId">Doktor ID</label>
                    <input type="text" class="form-control @error('doctor_id') is-invalid @enderror" id="inputDoctorId" name="doctor_id" placeholder="Doktorun ID'si" value="{{ old('doctor_id') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPatientId">Hasta ID</label>
                    <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="inputPatientId" name="user_id" placeholder="Hastanın ID'si" value="{{ old('user_id') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAppointmentDate">Randevu Tarihi</label>
                    <input type="text" class="form-control @error('appt_date') is-invalid @enderror" id="inputAppointmentDate" name="appt_date" value="{{ old('appt_date') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAppointmentDetail">Randevu Notları</label>
                    <textarea class="form-control" id="inputAppointmentDetail" name="inputAppointmentDetail" rows="4">{{ old('appt_detail') }}</textarea>
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
