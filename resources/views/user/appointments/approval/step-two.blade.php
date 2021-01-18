@extends('user.layouts.master')
@section('title','BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORMU - 2')
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
            <form action="{{ route('user.approval.step.two.post',$id) }}" method="POST">
              @csrf
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORMU - 2</h3>
                </div>
                <div class="card-body">@php
                  $doctor_id = \App\Models\Appointment::where('id', $id)->value('doctor_id');
                  $user_id = \App\Models\Appointment::where('id', $id)->value('user_id');
                  $birthdate = \App\Models\User::where('id', $user_id)->value('birthdate');
                  $age = \Carbon\Carbon::parse($birthdate)->age;
                @endphp @if ($age >= 8)
                  <p style="text-align:justify;">
                    <b>Araştırmanın Adı</b>: Ankara Üniversitesi Tıp Fakültesi Çocuk Metabolizma Bilim Dalı’nda Takipli Hastaların Teletıp Sistemi ile Uzaktan Değerlendirilmesi ve Teletıp Memnuniyet Ölçeğinin Uygulanması
                    <br><br>
                    <b>Araştırmanın Kolay Anlaşılır Adı</b>: Ankara Üniversitesi Tıp Fakültesi Çocuk Metabolizma Bilim Dalı’nda Takipli Hastaların Teletıp Sistemi (Canlı Görüntülü Görüşme) ile Uzaktan Değerlendirilmesi ve Teletıp Memnuniyet Ölçeğinin Uygulanması
                    <br><br>
                    <b>Merhaba {{ \App\Models\User::where('id', $user_id)->value('name') }}</b>,
                    <br><br>
                    Ben senin takipli olduğun hastanede çalışan bir doktor/hemşire/diyetisyenim. Daha önceki poliklinik kontrollerinde tanışmış olmalıyız. Ancak tanışmadıysak öncelikli olarak kendimi sana tanıtmak isterim. Ben Doktor/Hemşire/Diyetisyen <b>{{ \App\Models\Doctor::where('id', $doctor_id)->value('name') }}</b>. Seninle tanıştığıma çok memnun oldum.
                    <br><br>
                    Seninle ve anne-baban ile bugün bilgisayar/tablet/telefon aracılığıyla görüntülü görüşme yapmayı planladık. <b>Amacımız, senin sağlığının iyi olup olmadığını kontrol etmek. Eğer bu görüşmeye izin/onay verirsen, anne-babanla ve seninle biraz sağlığın üzerine sohbet edeceğiz</b>. İlaç ve diyet tedavilerini konuşacağız. Anne-babanın ve senin sormak istediğiniz sorular olursa, bunları yanıtlamaya çalışacağız. Dilediğin zaman, sorularını bana sorabilirsin. <b>Burada konuştuklarımızın hepsi sen, ben, annen ve baban arasında kalacaktır. Hem konuştuklarımızı hem de bu video görüntülerimizi kimseyle paylaşmayacağıma sana söz veriyorum</b>. Kendini güvende ve huzurlu hissetmen bizim için çok önemli, kendini kötü hissedersen bize haber vermeni rica ediyorum.
                    <br><br>
                    Uzaktan, seni hastanedeki gibi muayene etmem mümkün değil ancak bana el, kol, bacak, ayak ve yüz gibi bölgelerinde göstermek istediğin alanlar olur ise kamerada bakarak muayene edebilirim. Ancak bunu yapmamız şart değil, eğer bu durumdan hoşlanmayacaksan, yapmayabiliriz. <b>Tamamen senin kararına uyacağız</b>.
                    <br><br>
                    Tüm görüşmemiz yaklaşık yarım saat sürecektir. <b>Görüşme esnasında anne-babana hastalığın ile ilgili bazı sorular yönlendireceğim</b>. Bu soruların hepsi daha önce poliklinikte anne-baban ile üzerinde konuştuğumuz sorular olacaktır. Dilersen bir kısmına sen de cevap verebilirsin. Bir de görüşmemizin sonunda, bu görüntülü görüşmeden memnun kalıp kalmadığınızı değerlendirmek için birkaç soru soracağım. Bu konuda senin fikirlerin de bizim için çok kıymetli. Tüm sorularıma göstereceğin sabır için şimdiden çok teşekkür ederim. <b>Görüşme esnasında, kendini iyi hissetmez isen, kamera önünden çekilip anne-baban ve beni uzaktan seyredebilirsin. Dilersen başka odaya da geçebilirsin. Anne-babanın benimle görüşmesi için göstereceğin sabır için de çok teşekkür ederim</b>.
                    <br><br>
                    Önce de söylediğim gibi, bu görüşmedeki tek amacım senin sağlık durumun hakkında bilgi sahibi olabilmek ve bu görüntülü görüşmeden ne kadar memnun kaldığınızı öğrenebilmektir.
                    <br><br>
                    Eğer onay verirsen görüşmeyi başlatacağım. Verdiğin onaydan istediğin zaman vazgeçme hakkının olduğunu da söylemek isterim. Bana yardım ettiğin için çok teşekkür ederim.
                    <br><br>
                    Bir sonraki poliklinik kontrolünde görüşmek üzere.
                    <br><br>
                  </p>@if ($errors->any())

                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    There were some problems:<br>
                    <ul>@foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>@endforeach

                    </ul>
                  </div>@endif

                  <h3>Hasta Oluru</h3>

                  <div class="form-group">
                    <label for="inputPatientName">Hastanın Adı-Soyadı</label>
                    <input type="text" class="form-control" id="inputPatientName" name="patient_name" value="{{ \App\Models\User::where('id', $user_id)->value('name') }}" disabled>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="inputPatientApproval" name="user_approval" value="1">
                    <label for="inputPatientApproval" class="custom-control-label">Görüşmeye katılmayı istiyorsan burayı işaretleyebilirsin.</label>
                  </div>@else
                  <div class="alert alert-warning alert-dismissible">
                    <b>{{ \App\Models\User::where('id', $user_id)->value('name') }}</b> adlı hasta 8 yaşından küçük olduğu için kendisinden onay alınmayacaktır. Bu adımı geçebilirsiniz.
                  </div>
                  <input type="hidden" id="inputPatientApproval" name="user_approval" value="1">@endif
                </div>

                <div class="card-footer text-right clearfix">
                  <a href="{{ route('user.approval.step.one',$id) }}" class="btn btn-outline-secondary">Geri</a>
                  <button type="submit" class="btn btn-primary">İleri</button>
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
