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
                    <input type="email" class="form-control @error('doctor_email') is-invalid @enderror" id="inputDoctorEmail" name="doctor_email" placeholder="Doktorun E-postası" value="{{ old('doctor_email') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPatientTc">Hasta T.C. Kimlik No</label>
                    @if (!empty($id))
                      @php
                        $tckimlik = \App\Models\User::where('id', $id)->value('tckimlik');
                      @endphp
                      <input type="text" class="form-control @error('user_tc') is-invalid @enderror" id="inputPatientTc" name="user_tc" placeholder="Hastanın T.C. Kimlik No'su" value="{{ $tckimlik }}" required>
                    @else
                      <input type="text" class="form-control @error('user_tc') is-invalid @enderror" id="inputPatientTc" name="user_tc" placeholder="Hastanın T.C. Kimlik No'su" value="{{ old('user_tc') }}" required>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputAppointmentDate">Randevu Tarihi</label>
                    <input type="text" class="form-control @error('appt_date') is-invalid @enderror" id="inputAppointmentDate" name="appt_date" value="{{ old('appt_date') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAppointmentDetail">Randevu Notları</label>
                    <textarea class="form-control" id="inputAppointmentDetail" name="appt_detail" rows="4">{{ old('appt_detail') }}</textarea>
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
