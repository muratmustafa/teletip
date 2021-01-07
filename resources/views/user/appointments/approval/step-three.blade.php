@extends('user.layouts.master')
@section('title','BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORM ÖZETİ')
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
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">
            <form action="{{ route('user.approval.step.three.post',$id) }}" method="POST">
              @csrf
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORM ÖZETİ</h3>
                </div>@php
                    $user_id = \App\Models\Appointment::where('id', $id)->value('user_id');
                    $doctor_id = \App\Models\Appointment::where('id', $id)->value('doctor_id');
                @endphp
                <div class="card-body">

                    <h3>Özet</h3>

                    <table class="table">
                        <tr>
                            <td>1. Kişinin Hastaya Yakınlık Derecesi:</td>
                            <td><strong>{{$approval->parent_degree}}</strong></td>
                        </tr>
                        <tr>
                            <td>1. Kişinin Adı-Soyadı:</td>
                            <td><strong>{{$approval->parent_name}}</strong></td>
                        </tr>
                        <tr>
                            <td>1. Kişinin Onamı:</td>
                            <td><strong>{{$approval->parent_approval ? 'Evet' : 'Hayır'}}</strong></td>
                        </tr>
                        <tr>
                            <td>2. Kişinin Hastaya Yakınlık Derecesi:</td>
                            <td><strong>{{$approval->other_parent_degree}}</strong></td>
                        </tr>
                        <tr>
                            <td>2. Kişinin Adı-Soyadı:</td>
                            <td><strong>{{$approval->other_parent_name}}</strong></td>
                        </tr>
                        <tr>
                            <td>2. Kişinin Onamı:</td>
                            <td><strong>{{$approval->other_parent_approval ? 'Evet' : 'Hayır'}}</strong></td>
                        </tr>
                        <tr>
                            <td>Hastanın Adı-Soyadı:</td>
                            <td><strong>{{ \App\Models\User::where('id', $user_id)->value('name') }}</strong></td>
                        </tr>
                        <tr>
                            <td>Hastanın Onamı:</td>
                            <td><strong>{{$approval->user_approval ? 'Evet' : 'Hayır'}}</strong></td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer text-right clearfix">
                  <button type="submit" class="btn btn-primary">Görüşmeye Katıl</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-2">
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
