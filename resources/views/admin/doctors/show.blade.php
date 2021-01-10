@extends('admin.layouts.master')
@section('title','Doktor')
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
                <h3 class="profile-username text-center">{{ $doctor->name }}</h3>
                <p class="text-muted text-center">Doktor</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>E-posta</b> <a class="float-right">{{ $doctor->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Birimi</b> <a class="float-right">{{ $doctor->branch }}</a>
                  </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Randevu Ekle</b></a>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="far fa-file-alt mr-1"></i> Notlar</h3>
              </div>
              <div class="card-body">
                <p class="text-muted"></p>
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
                  <div class="tab-pane" id="appointments">
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
