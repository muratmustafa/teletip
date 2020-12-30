@extends('doctor.layouts.master')
@section('title','Tüm Randevularım')
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
          <div class="col-lg-12">
@if ($message = Session::get('success'))

            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $message }}
            </div>@endif

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user-md"></i>
                  Tüm Randevularım
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a href="{{ url('/doctor/survey') }}" target="_blank" class="btn btn-success" title="Yeni Anket Oluştur" data-toggle="tooltip"><span class="fas fa-plus"></span> Anket Oluştur</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th>Hastanın Adı</th>
                      <th style="width: 15%">Randevu Tarihi</th>
                      <th style="width: 15%">Durum</th>
                      <th style="width: 25%">Randevu Notları</th>
                      <th style="width: 15%" class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>@foreach ($appointments as $appointment)

                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ \App\Models\User::where('id', $appointment->user_id)->value('name') }}</td>
                      <td>{{ $appointment->appt_date }}</td>
                      <td>{{ $appointment->appt_status }}</td>
                      <td><div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:250px;">{{ $appointment->appt_detail }}</div></td>
                      <td class="text-right">@php $today = date("Y-m-d"); $appt_date = \Carbon\Carbon::parse($appointment->appt_date)->format('Y-m-d') @endphp @if ($appt_date === $today && $appointment->appt_status === "Normal")

                        <a href="https://metabolizmateletip.ankara.edu.tr:90/{{ $appointment->room_name }}" target="_blank" class="btn btn-info" title="Görüşmeye Katıl" data-toggle="tooltip"><span class="fas fa-phone"></span> Görüşmeye Katıl</a>@endif

                        <a href="{{ route('doctor.appointments.show',$appointment->id) }}" class="btn btn-primary" title="Görüntüle" data-toggle="tooltip"><span class="fas fa-eye"></span></a>
                        <a href="{{ route('doctor.appointments.edit',$appointment->id) }}" class="btn btn-info" title="Güncelle" data-toggle="tooltip"><span class="fas fa-pen"></span></a>
                      </td>
                    </tr>@endforeach

                  </tbody>
                </table>
              </div>

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {{ $appointments->links() }}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
