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
              </div>
            @endif
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-calendar-check"></i>
                  Tüm Randevularım
                </h3>
                <ul class="nav nav-pills" style="float: right">
                  <li class="nav-item"><a class="nav-link active" href="#cal" data-toggle="tab">Takvim Görünümü</a></li>
                  <li class="nav-item"><a class="nav-link" href="#list" data-toggle="tab">Liste Görünümü</a></li>
                </ul>
              </div>
              <div class="card-body p-0">
                <div class="tab-content">
                  <div class="tab-pane active" id="cal">
                    <div class="row">
                      <div class="col-lg-2"></div>
                      <!-- THE CALENDAR -->
                      <div id="calendar" class="col-lg-8"></div>
                      <div class="col-lg-2"></div>
                    </div>
                  </div>
                  <div class="tab-pane" id="list">
                    <div class="table-responsive">
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
                        <tbody>
                          @foreach ($appointments as $appointment)
                            <tr>
                              <td>{{ ++$i }}</td>
                              <td>{{ \App\Models\User::where('id', $appointment->user_id)->value('name') }}</td>
                              <td>{{ \Carbon\Carbon::parse($appointment->appt_date)->format('Y-m-d H:i') }}</td>
                              <td>{{ $appointment->appt_status }}</td>
                              <td><div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:250px;">{{ $appointment->appt_detail }}</div></td>
                              <td class="text-right">
                                @php
                                  $today = date("Y-m-d");
                                  $appt_date = \Carbon\Carbon::parse($appointment->appt_date)->format('Y-m-d')
                                @endphp
                                @if ($appt_date === $today && $appointment->appt_status === "Normal")
                                  <a href="https://metabolizmateletip.ankara.edu.tr:44444/{{ $appointment->room_name }}" target="_blank" class="btn btn-success" title="Görüşmeye Katıl" data-toggle="tooltip"><span class="fas fa-phone"></span> Görüşme</a>
                                  <a href="{{ route('doctor.survey.index',$appointment->id) }}" target="_blank" class="btn btn-info" title="Anket Oluştur" data-toggle="tooltip"><span class="fas fa-calendar-check"></span></a>
                                @endif
                                <a href="{{ route('doctor.appointments.show',$appointment->id) }}" class="btn btn-primary" title="Görüntüle" data-toggle="tooltip"><span class="fas fa-eye"></span></a>
                                <a href="{{ route('doctor.appointments.edit',$appointment->id) }}" class="btn btn-info" title="Güncelle" data-toggle="tooltip"><span class="fas fa-pen"></span></a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
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

@section('end')
<!-- fullCalendar 2.2.5 -->
<script src="{{asset("/")}}plugins/moment/moment.min.js"></script>
<script src="{{asset("/")}}plugins/fullcalendar/main.min.js"></script>
<script src="{{asset("/")}}plugins/fullcalendar/locales/tr.js"></script>
<script src="{{asset("/")}}plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="{{asset("/")}}plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="{{asset("/")}}plugins/fullcalendar-interaction/main.min.js"></script>
<script src="{{asset("/")}}plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the calendar
     -----------------------------------------------------------------*/
    var Calendar = FullCalendar.Calendar;

    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events    : [
        @foreach ($appointments as $appointment)

        {
          title          : '{{ \App\Models\User::where('id', $appointment->user_id)->value('name') }}',
          start          : new Date({{ \Carbon\Carbon::parse($appointment->appt_date)->subMonth()->format('Y, m, d, H, i') }}),
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        },

        @endforeach
      ],
      initialView: 'dayGridWeek',
      locale    : 'tr'
    });

    calendar.render();
  })
</script>
@endsection
