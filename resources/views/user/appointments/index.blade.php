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
                      <td class="text-right">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#onam-formu{{ $i }}"><span class="fas fa-phone"></span> Görüşmeye Katıl</button>
                        <a href="{{ route('user.appointments.show',$appointment->id) }}" class="btn btn-primary" title="Görüntüle" data-toggle="tooltip"><span class="fas fa-eye"></span></a>
                      </td>

                      <div class="modal fade" id="onam-formu{{ $i }}">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORMU</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Vazgeç">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>
                                <strong>Merhaba {{ \App\Models\User::where('id', $appointment->user_id)->value('name') }},</strong>
                                <br>
                                <br>
                                Ben senin takipli olduğun hastanede çalışan bir doktor/hemşire/diyetisyenim. Daha önceki poliklinik kontrollerinde tanışmış olmalıyız. Ancak tanışmadıysak öncelikli olarak kendimi sana tanıtmak isterim. Ben <strong>{{ \App\Models\Doctor::where('id', $appointment->doctor_id)->value('name') }}</strong>. Seninle tanıştığıma çok memnun oldum.
                                <br>
                                <br>
                                Seninle ve anne-baban ile bugün bilgisayar/tablet/telefon aracılığıyla görüntülü görüşme yapmayı planladık. <strong>Amacımız, senin sağlığının iyi olup olmadığını kontrol etmek. Eğer bu görüşmeye izin/onay verirsen, anne-babanla ve seninle biraz sağlığın üzerine sohbet edeceğiz.</strong> İlaç ve diyet tedavilerini konuşacağız. Anne-babanın ve senin sormak istediğiniz sorular olursa, bunları yanıtlamaya çalışacağız. Dilediğin zaman, sorularını bana sorabilirsin. <strong>Burada konuştuklarımızın hepsi sen, ben, annen ve baban arasında kalacaktır. Hem konuştuklarımızı hem de bu video görüntülerimizi kimseyle paylaşmayacağıma sana söz veriyorum.</strong> Kendini güvende ve huzurlu hissetmen bizim için çok önemli, kendini kötü hissedersen bize haber vermeni rica ediyorum.
                                <br>
                                <br>
                                Uzaktan, seni hastanedeki gibi muayene etmem mümkün değil ancak bana el, kol, bacak, ayak ve yüz gibi bölgelerinde göstermek istediğin alanlar olur ise kamerada bakarak muayene edebilirim. Ancak bunu yapmamız şart değil, eğer bu durumdan hoşlanmayacaksan, yapmayabiliriz. <strong>Tamamen senin kararına uyacağız.</strong>
                                <br>
                                <br>
                                Tüm görüşmemiz yaklaşık yarım saat sürecektir. <strong>Görüşme esnasında anne-babana hastalığın ile ilgili bazı sorular yönlendireceğim.</strong> Bu soruların hepsi daha önce poliklinikte anne-baban ile üzerinde konuştuğumuz sorular olacaktır. Dilersen bir kısmına sen de cevap verebilirsin. Bir de görüşmemizin sonunda, bu görüntülü görüşmeden memnun kalıp kalmadığınızı değerlendirmek için birkaç soru soracağım. Bu konuda senin fikirlerin de bizim için çok kıymetli. Tüm sorularıma göstereceğin sabır için şimdiden çok teşekkür ederim. <strong>Görüşme esnasında, kendini iyi hissetmez isen, kamera önünden çekilip anne-baban ve beni uzaktan seyredebilirsin. Dilersen başka odaya da geçebilirsin. Anne-babanın benimle görüşmesi için göstereceğin sabır için de çok teşekkür ederim.</strong>
                                <br>
                                <br>
                                Önce de söylediğim gibi, bu görüşmedeki tek amacım senin sağlık durumun hakkında bilgi sahibi olabilmek ve bu görüntülü görüşmeden ne kadar memnun kaldığınızı öğrenebilmektir.
                                <br>
                                <br>
                                Eğer onay verirsen görüşmeyi başlatacağım. Verdiğin onaydan istediğin zaman vazgeçme hakkının olduğunu da söylemek isterim. Bana yardım ettiğin için çok teşekkür ederim.
                                <br>
                                <br>
                                Bir sonraki poliklinik kontrolünde görüşmek üzere.
                                <div class="text-right">
                                Açıklamaları yapan kişinin adı soyadı: <strong>{{ \App\Models\Doctor::where('id', $appointment->doctor_id)->value('name') }}</strong>
                                <br>
                                Tarih: <strong>{{ date('d-m-Y') }}</strong>
                                </div>
                                HASTA OLURU
                                <br>
                                Hastanın Adı Soyadı: <strong>{{ \App\Models\User::where('id', $appointment->user_id)->value('name') }}</strong>
                                <br>
                                Tarih: <strong>{{ date('d-m-Y') }}</strong>
                                <br>
                                <strong>*</strong><i>8 yaşından büyük hastalar onaylayacaktır.</i>
                              </p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                              <a href="https://metabolizmateletip.ankara.edu.tr/room/{{ $appointment->room_name }}?name={{ \App\Models\User::where('id', $appointment->user_id)->value('name') }}" class="btn btn-info" title="Görüşmeye Katıl" data-toggle="tooltip">Onaylıyorum</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </tr>@endforeach

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
