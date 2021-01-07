@extends('user.layouts.master')
@section('title','BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORMU - 1')
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
            <form action="{{ route('user.approval.step.one.post',$id) }}" method="POST">
              @csrf
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">BİLGİLENDİRİLMİŞ GÖNÜLLÜ OLUR FORMU - 1</h3>
                </div>
                <div class="card-body">
                  <p style="text-align:justify;">
                    <b>Araştırmanın Adı</b>: Ankara Üniversitesi Tıp Fakültesi Çocuk Metabolizma Bilim Dalı’nda Takipli Hastaların Teletıp Sistemi ile Uzaktan Değerlendirilmesi ve Teletıp Memnuniyet Ölçeğinin Uygulanması
                    <br><br>
                    <b>Araştırmanın Kolay Anlaşılır Adı</b>: Ankara Üniversitesi Tıp Fakültesi Çocuk Metabolizma Bilim Dalı’nda Takipli Hastaların Teletıp Sistemi (Canlı Görüntülü Görüşme) ile Uzaktan Değerlendirilmesi ve Teletıp Memnuniyet Ölçeğinin Uygulanması
                    <br><br>
                    <b>Sevgili Gönüllü</b>,
                    <br><br>
                    Katılacak olduğunuz çalışma bir araştırma niteliğindedir. Bu araştırmaya Ankara Üniversitesi Tıp Fakültesi Çocuk Metabolizma Bilim Dalı’nda takip eden gönüllü hastalar dahil edilecektir.
                    <br><br>
                    Araştırmamızdan kısaca bahsetmek istemekteyiz.
                    <br><br>
                    Teletıp sistemi, hekim, diyetisyen, hemşire gibi sağlık çalışanlarının hastalar ile canlı olarak telefon veya görüntülü görüşme ile karşılıklı iletişime geçmesi esasına dayanmaktadır. <b>Biz araştırmamızda görüntülü görüşme yapmayı planlamaktayız</b>.
                    <br><br>
                    Ülkemizin ve tüm dünyanın coronavirus salgını nedeni ile almış olduğu tedbirler kapsamında kronik hastalığı bulunan hastaların hastaneye erişiminde yaşadığı zorlukları göz önünde bulundurarak, bu konuya bir çözüm getirmeyi amaçlamaktayız. Teletıp sayesinde sizlerle yüzyüze iletişime geçecek, çocuğunuzun son durumu hakkında bilgi alabilecek ve sorularınızı dinleyerek cevap verebileceğiz. Gereklilik halinde (mahrem bölgeler olmaması koşulu ile) ekrandan gözle muayene yapabileceğiz (örneğin, cilt muayenesi gibi). Çocuğunuzun aldığı diyet ve tedavi uygulamalarını gözden geçirip sorularınızı yanıtlayacağız. Teletıp görüşmemiz, size oluşturduğumuz randevu gün ve saatinde yaklaşık olarak <b>30 dk sürecektir</b>. Bu görüşmeyi çevrimiçi olarak bir internet sayfası üzerinden gerçekleştireceğiz. Bilgisayar, telefon veya tabletinizde internet tarayıcı bir programın yüklü olmasını istemekteyiz. <b>Programı indirmek/yüklemek ve kullanmak ile ilgili yaşadığınız her türlü sorunlar için araştırma ekibinden uzman hekimler size telefondan danışmanlık verecek ve her basamakta yardım edecektir</b>. Sisteminizin kullanılabilir hale gelmiş olması durumunda, görüşme talebi, uzman hekim tarafından oluşturulacak ve görüşmenin başlatılabilmesi için gerekli tanımlama kodları ve şifreler size mail veya mesaj yolu ile gönderilecektir. Bu aşamada yaşadığınız sorunlar için yine uzman hekimler tarafından telefon ile yardım alabileceksiniz. “<b>Görüşmeye başlamadan önce bu onam belgesini okuyup ad ve soyadınızı (hem anne hem baba) ilgili bölümlere yazarak, sistem üzerinden ‘görüntülü görüşmeyi kabul ediyorum’ butonuna basmanız gerekmektedir.</b>”
                    <br><br>
                    Görüşme esnasında çocuğunuzun hastalığı ile ilgili son durumu, aldığı diyet tedavisi, ilaç tedavisi gibi bilgilerini kayıt altına alacağımız <b>araştırma form sorularını size yönlendireceğiz</b>. Tüm sorular interaktif olup gerekli yerlerde tarafınızdan gelecek sorular dinlenip evde güvenli şekilde uygulanacak çözümler üretilmeye çalışılacaktır. Eğer evde tartı ve boy ölçeriniz var ise çocuğunuzun son boy ve kilo değerlerini de sizden rica edeceğiz. <b>Bu görüşme için sizden ve bağlı olduğunuz sigorta kurumundan herhangi bir ücret talep edilmeyecek, polikliniğe giriş açtırılmayacaktır</b>. Görüşme esnasında aldığımız notlar, halihazırda çocuğunuz adına var olan <b>metabolizma dosyasına yazılarak kaydedilecektir</b>. Karşılıklı hakların korunması adına bu görüşme esnasında ses ve görüntü kaydı alınacaktır. Ses ve görüntüler yalnızca araştırmacılarda kalacak olup başka hiçbir kurum, kuruluş veya şahıs ile paylaşılmayacaktır. Görüşmemiz sonunda teletıp sisteminden duymuş olduğunuz memnuniyetin düzeyini değerlendirmek istemekteyiz. Bu amaç ile size <b>Teletıp Memnuniyet ölçeği</b> sorularını yönlendireceğiz, bu ölçek de <b>yaklaşık 5-10 dk sürecektir</b> (toplam bildirilen 30 dk’lık süre içerisinde yer alacaktır).
                    <br><br>
                    Bilgilendirilmiş olur verdiğiniz takdirde, araştırmaya dahil edileceksiniz. Çalışma süresince, herhangi bir zamanda <b>hiçbir mazeret bildirmeden olurunuzu geri alma hakkına sahipsiniz</b> ve bundan dolayı sonraki tıbbi takip ve tedavileriniz esnasında mevcut haklarınızdan <b>herhangi bir kayba uğramanız söz konusu değildir</b>. Araştırma konusuyla ilgili, araştırmaya katılmaya devam etme isteğinin etkilenebileceği yeni bilgiler söz konusu olduğunda, size derhal bilgi verilecektir.
                    <br><br>
                    Kaydedeceğimiz veriler gizlilik kurallarına uygun olarak saklanacak ve sonuçlar bilimsel amaçla yayınlandığında, sizin kimlik bilgileriniz gizli tutulacaktır. Bu araştırmaya katılmayı kabul ederseniz, isminiz ve tıbbi kayıtlarınız gizli tutulacak ve hastane dışında açıklanmayacaktır. Bu belgeyi imzalayarak çocuğunuzun tıbbi bilgilerinin bu şartlar altında kullanılmasına izin vermektesiniz.
                    <br><br>
                    Eğer çalışma ile ilgili daha detaylı bilgi almak isterseniz veya çalışma süresince aklınıza takılan bir soru olursa, çalışmanın sorumlu yürütücüsü ve yardımcı araştırıcısı olan <b>Doç.Dr. Tuba EMİNOĞLU</b> ve <b>Dr. Merve KOÇ YEKEDÜZ</b>’e danışabilirsiniz.
                    <br><br>
                    <b>Tel</b>: +90 (312) 595 7368 / Çocuk Metabolizma Bilim Dalı
                  </p>@if ($errors->any())

                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    There were some problems:<br>
                    <ul>@foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>@endforeach

                    </ul>
                  </div>@endif

                  <h3>Gönüllü Oluru</h3>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="inputParentDegree">1. Kişinin Hastaya Yakınlık Derecesi</label>
                        <select class="form-control custom-select" id="inputParentDegree" name="parent_degree" required>
                          <option selected>Seçiniz</option>
                          <option value="Anne">Annesi</option>
                          <option value="Baba">Babası</option>
                          <option value="Akraba">2. veya 3. Dereceden Akrabası</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputParentName">1. Kişinin Adı-Soyadı</label>
                        <input type="text" class="form-control" id="inputParentName" name="parent_name" required>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="inputParentApproval" name="parent_approval" value="1" required>
                        <label for="inputParentApproval" class="custom-control-label">Yukarıdaki bilgileri okudum. Aynı zamanda bana sözlü açıklama da yapıldı. Bu koşullar altında, kendi rızam ile bu çalışmaya katılmayı kabul ediyorum.</label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="inputOtherParentDegree">2. Kişinin Hastaya Yakınlık Derecesi</label>
                        <select class="form-control custom-select" id="inputOtherParentDegree" name="other_parent_degree">
                          <option selected>Seçiniz</option>
                          <option value="Anne">Annesi</option>
                          <option value="Baba">Babası</option>
                          <option value="Akraba">2. veya 3. Dereceden Akrabası</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputOtherParentName">2. Kişinin Adı-Soyadı</label>
                        <input type="text" class="form-control" id="inputOtherParentName" name="other_parent_name">
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="inputOtherParentApproval" name="other_parent_approval" value="1">
                        <label for="inputOtherParentApproval" class="custom-control-label">Yukarıdaki bilgileri okudum. Aynı zamanda bana sözlü açıklama da yapıldı. Bu koşullar altında, kendi rızam ile bu çalışmaya katılmayı kabul ediyorum.</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-footer text-right clearfix">
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
