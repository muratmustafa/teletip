@extends('doctor.layouts.master')
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
          <div class="col-lg-3">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Hoşgeldiniz</h5>
              </div>
              <div class="card-body">

                <p class="card-text">{{ config('app.name', 'TELETIP') }} sitesine hoşgeldiniz.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
