@extends('user.layouts.master')
@section('title','Tüm Randevularım')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>

    <style>
      @media screen and (max-width: 768px) {
        .table thead {
          display: none;
        }
        .table tr {
          display: block;
          border-top: 2px solid lightgray;
        }
        .table td {
          display: block;
          text-align: right;
        }
        .table td:before {
          content: attr(data-label);
          float: left;
          font-weight: 700;
        }
      }
    </style>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user-md"></i>
                  Tüm Randevularım
                </h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th>Doktorun Adı</th>
                      <th style="width: 15%">Randevu Tarihi</th>
                      <th style="width: 15%">Durum</th>
                      <th style="width: 25%">Randevu Notları</th>
                      <th style="width: 15%" class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($appointments as $appointment)
                      <tr>
                        <td data-label="#">{{ ++$i }}</td>
                        <td data-label="Doktorun Adı">{{ \App\Models\Doctor::where('id', $appointment->doctor_id)->value('name') }}</td>
                        <td data-label="Randevu Tarihi">{{ $appointment->appt_date }}</td>
                        <td data-label="Durum">{{ $appointment->appt_status }}</td>
                        @if (empty($appointment->appt_detail))
                        <td data-label="Randevu Notları">-</td>
                        @else
                        <td data-label="Randevu Notları">{{ Str::limit($appointment->appt_detail,50,'...') }}</td>
                        @endif
                        <td class="text-right" data-label="">
                          @php
                            $today = date("Y-m-d");
                            $appt_date = \Carbon\Carbon::parse($appointment->appt_date)->format('Y-m-d')
                          @endphp
                          @if ($appt_date === $today && $appointment->appt_status === "Normal")
                            <a href="{{ route('user.approval.step.one',$appointment->id) }}" class="btn btn-info" title="Görüşmeye Katıl" data-toggle="tooltip"><span class="fas fa-phone"></span> Görüşmeye Katıl</a>
                          @endif
                          <a href="{{ route('user.appointments.show',$appointment->id) }}" class="btn btn-primary" title="Görüntüle" data-toggle="tooltip"><span class="fas fa-eye"></span></a>
                        </td>
                      </tr>
                    @endforeach
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
