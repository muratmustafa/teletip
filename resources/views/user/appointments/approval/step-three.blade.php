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
                            <td><strong>{{ !empty($approval->parent_degree) ? $approval->parent_degree : '' }}</strong></td>
                        </tr>
                        <tr>
                            <td>1. Kişinin Adı-Soyadı:</td>
                            <td><strong>{{ !empty($approval->parent_name) ? $approval->parent_name : '' }}</strong></td>
                        </tr>
                        <tr>
                            <td>1. Kişinin Onamı:</td>
                            <td><strong>{{ (!empty($approval->parent_approval) && $approval->parent_approval == 1) ? 'Evet' : '' }}</strong></td>
                        </tr>
                        <tr>
                            <td>2. Kişinin Hastaya Yakınlık Derecesi:</td>
                            <td><strong>{{ !empty($approval->other_parent_degree) ? $approval->other_parent_degree : '' }}</strong></td>
                        </tr>
                        <tr>
                            <td>2. Kişinin Adı-Soyadı:</td>
                            <td><strong>{{ !empty($approval->other_parent_name) ? $approval->other_parent_name : '' }}</strong></td>
                        </tr>
                        <tr>
                            <td>2. Kişinin Onamı:</td>
                            <td><strong>{{ (!empty($approval->other_parent_approval) && $approval->other_parent_approval == 1) ? 'Evet' : '' }}</strong></td>
                        </tr>
                        <tr>
                            <td>Hastanın Adı-Soyadı:</td>
                            <td><strong>{{ \App\Models\User::where('id', $user_id)->value('name') }}</strong></td>
                        </tr>
                        <tr>
                            <td>Hastanın Onamı:</td>
                            <td><strong>{{ (!empty($approval->user_approval) && $approval->user_approval == 1) ? 'Evet' : 'Hayır' }}</strong></td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer text-right clearfix">
                  <a href="{{ route('user.approval.step.two',$id) }}" class="btn btn-outline-secondary">Geri</a>
                  <button type="submit" class="btn btn-primary">Onayla ve Görüşmeye Katıl</button>
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
