<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') | {{ config('app.name', 'TELETIP') }}</title>
  <link rel="icon" href="{{asset('/')}}favicon.ico">

  <link rel="stylesheet" href="{{asset('/')}}plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css">
@if ((isset($show_date) && $show_date) || (isset($show_birthdate) && $show_birthdate))
  <link rel='stylesheet' href='{{asset("/")}}plugins/daterangepicker/daterangepicker.css'>
@endif
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset("/")}}plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="{{asset("/")}}plugins/fullcalendar-interaction/main.min.css">
  <link rel="stylesheet" href="{{asset("/")}}plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="{{asset("/")}}plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="{{asset("/")}}plugins/fullcalendar-bootstrap/main.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/doctor') }}" class="nav-link">Ana Sayfa</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">İletişim</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Logout Button -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('doctor.logout') }}">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
