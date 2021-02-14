@extends('doctor.layouts.master')
@section('title','Hasta')
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
          <div class="col-md-3">

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/blank-profile.png" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">Hasta</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>T.C. Kimlik No</b> <a class="float-right">{{ $user->tckimlik }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Telefon</b> <a class="float-right">{{ $user->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Doğum Tarihi</b> <a class="float-right">{{ $user->birthdate }}</a>
                  </li>
                </ul>
                <a href="{{ route('doctor.appt_create',$user->id) }}" class="btn btn-primary btn-block"><b>Randevu Ver</b></a>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="far fa-file-alt mr-1"></i> Metabolik Hastalık Tanısı</h3>
              </div>
              <div class="card-body">
                <p class="text-muted">{{ $user->diagnostic }}</p>
              </div>
            </div>

          </div>

          <div class="col-md-9">

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#appointments" data-toggle="tab">Randevular</a></li>
                  <li class="nav-item"><a class="nav-link" href="#reports" data-toggle="tab">Raporlar</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="appointments">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 15%">Randevu Tarihi</th>
                            <th style="width: 15%">Durum</th>
                            <th style="width: 25%">Randevu Notları</th>
                            <th style="width: 15%" class="text-center"></th>
                          </tr>
                        </thead>
                        <tbody>@foreach ($appointments as $appointment)
      
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $appointment->appt_date }}</td>
                            <td>{{ $appointment->appt_status }}</td>
                            <td><div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:250px;">{{ $appointment->appt_detail }}</div></td>
                            <td class="text-right">@php $today = date("Y-m-d"); $appt_date = \Carbon\Carbon::parse($appointment->appt_date)->format('Y-m-d') @endphp @if ($appt_date === $today && $appointment->appt_status === "Normal")
      
                              <a href="https://metabolizmateletip.ankara.edu.tr:44444/{{ $appointment->room_name }}" target="_blank" class="btn btn-success" title="Görüşmeye Katıl" data-toggle="tooltip"><span class="fas fa-phone"></span> Görüşmeye Katıl</a>
                              <a href="{{ route('doctor.survey.index',$appointment->id) }}" target="_blank" class="btn btn-info" title="Anket Oluştur" data-toggle="tooltip"><span class="fas fa-calendar-check"></span> Anket Oluştur</a>@endif
      
                              <a href="{{ route('doctor.appointments.show',$appointment->id) }}" class="btn btn-primary" title="Görüntüle" data-toggle="tooltip"><span class="fas fa-eye"></span></a>
                              <a href="{{ route('doctor.appointments.edit',$appointment->id) }}" class="btn btn-info" title="Güncelle" data-toggle="tooltip"><span class="fas fa-pen"></span></a>
                            </td>
                          </tr>@endforeach
      
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="reports">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
