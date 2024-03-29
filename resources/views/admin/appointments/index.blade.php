@extends('admin.layouts.master')
@section('title','Tüm Randevular')
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
                  <i class="fas fa-user-md"></i>
                  Tüm Randevular
                </h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 5%">#</th>
                      <th>Doktorun Adı</th>
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
                        <td>{{ \App\Models\Doctor::where('id', $appointment->doctor_id)->value('name') }}</td>
                        <td>{{ \App\Models\User::where('id', $appointment->user_id)->value('name') }}</td>
                        <td>{{ $appointment->appt_date }}</td>
                        <td>{{ $appointment->appt_status }}</td>
                        <td><div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:250px;">{{ $appointment->appt_detail }}</div></td>
                        <td class="text-right">
                          <div class="btn-group btn-group-sm">
                            <form action="{{ route('admin.appointments.destroy',$appointment->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('admin.appointments.show',$appointment->id) }}" class="btn btn-primary" title="Görüntüle" data-toggle="tooltip"><span class="fas fa-eye"></span></a>
                              <a href="{{ route('admin.appointments.edit',$appointment->id) }}" class="btn btn-info" title="Güncelle" data-toggle="tooltip"><span class="fas fa-pen"></span></a>
                              <button type="submit" class="btn btn-danger" title="Sil" data-toggle="tooltip"><span class="fas fa-trash"></span></button>
                            </form>
                          </div>
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
