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
                  <tbody>@foreach ($appointments as $appointment)

                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ \App\Models\Doctor::where('id', $appointment->doctor_id)->value('name') }}</td>
                      <td>{{ $appointment->appt_date }}</td>
                      <td>{{ $appointment->appt_status }}</td>
                      <td><div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:250px;">{{ $appointment->appt_detail }}</div></td>
                      <td class="text-right">@php $today = date("Y-m-d"); $appt_date = \Carbon\Carbon::parse($appointment->appt_date)->format('Y-m-d') @endphp @if ($appt_date === $today && $appointment->appt_status === "Normal")

                        <button type="button" class="btn btn-info" id="onam" data-toggle="modal" data-target="#onam-form" data-url="{{ route('user.modalOnamForm',['id'=>$appointment->id])}}"><span class="fas fa-phone"></span> Görüşmeye Katıl</button>@endif
                        <a href="{{ route('user.appointments.show',$appointment->id) }}" class="btn btn-primary" title="Görüntüle" data-toggle="tooltip"><span class="fas fa-eye"></span></a>
                      </td>
                    </tr>@endforeach

                  </tbody>
                </table>
              </div>

              <div class="modal fade" id="onam-form">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div id="modal-loader" class="overlay d-flex justify-content-center align-items-center">
                      <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                    <div class="modal-header">
                      <h4 class="modal-title">BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORMU</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Vazgeç">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div id="onam-body">
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
<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('click', '#onam', function(e) {
          e.preventDefault();
          var url = $(this).data('url');
          $('#onam-body').html('');
          $('#modal-loader').css('visibility', 'visible');
          $.ajax({
              url: url,
              type: 'GET',
              dataType: 'html'
          })
          .done(function(data) {
              $('#onam-body').html('');
              setTimeout(function() {
                $('#onam-body').html(data);
                $('#modal-loader').css('visibility', 'hidden');
              }, 800);
          })
          .fail(function(){
            setTimeout(function() {
              $('#onam-body').html('Bir şey oldu...');
              $('#modal-loader').css('visibility', 'hidden');
            }, 1200);
          });
      });
  });
</script>
@endsection
