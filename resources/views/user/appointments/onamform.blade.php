                    <div class="modal-body" style="text-align:justify;">
                      <p>
                        <b>Araştırmanın Adı</b>: Ankara Üniversitesi Tıp Fakültesi Çocuk Metabolizma Bilim Dalı’nda Takipli Hastaların Teletıp Sistemi ile Uzaktan Değerlendirilmesi ve Teletıp Memnuniyet Ölçeğinin Uygulanması
                        <br><br>
                        <b>Araştırmanın Kolay Anlaşılır Adı</b>: Ankara Üniversitesi Tıp Fakültesi Çocuk Metabolizma Bilim Dalı’nda Takipli Hastaların Teletıp Sistemi (Canlı Görüntülü Görüşme) ile Uzaktan Değerlendirilmesi ve Teletıp Memnuniyet Ölçeğinin Uygulanması                        
                        <br><br>
                        <b>Merhaba {{ \App\Models\User::where('id', $user_id)->value('name') }},</b>
                        <br><br>
                        Ben senin takipli olduğun hastanede çalışan bir doktor/hemşire/diyetisyenim. Daha önceki poliklinik kontrollerinde tanışmış olmalıyız. Ancak tanışmadıysak öncelikli olarak kendimi sana tanıtmak isterim. Ben <b>{{ \App\Models\Doctor::where('id', $doctor_id)->value('name') }}</b>. Seninle tanıştığıma çok memnun oldum.
                        <br><br>
                        Seninle ve anne-baban ile bugün bilgisayar/tablet/telefon aracılığıyla görüntülü görüşme yapmayı planladık. <b>Amacımız, senin sağlığının iyi olup olmadığını kontrol etmek. Eğer bu görüşmeye izin/onay verirsen, anne-babanla ve seninle biraz sağlığın üzerine sohbet edeceğiz.</b> İlaç ve diyet tedavilerini konuşacağız. Anne-babanın ve senin sormak istediğiniz sorular olursa, bunları yanıtlamaya çalışacağız. Dilediğin zaman, sorularını bana sorabilirsin. <b>Burada konuştuklarımızın hepsi sen, ben, annen ve baban arasında kalacaktır. Hem konuştuklarımızı hem de bu video görüntülerimizi kimseyle paylaşmayacağıma sana söz veriyorum.</b> Kendini güvende ve huzurlu hissetmen bizim için çok önemli, kendini kötü hissedersen bize haber vermeni rica ediyorum.
                        <br><br>
                        Uzaktan, seni hastanedeki gibi muayene etmem mümkün değil ancak bana el, kol, bacak, ayak ve yüz gibi bölgelerinde göstermek istediğin alanlar olur ise kamerada bakarak muayene edebilirim. Ancak bunu yapmamız şart değil, eğer bu durumdan hoşlanmayacaksan, yapmayabiliriz. <b>Tamamen senin kararına uyacağız.</b>
                        <br><br>
                        Tüm görüşmemiz yaklaşık yarım saat sürecektir. <b>Görüşme esnasında anne-babana hastalığın ile ilgili bazı sorular yönlendireceğim.</b> Bu soruların hepsi daha önce poliklinikte anne-baban ile üzerinde konuştuğumuz sorular olacaktır. Dilersen bir kısmına sen de cevap verebilirsin. Bir de görüşmemizin sonunda, bu görüntülü görüşmeden memnun kalıp kalmadığınızı değerlendirmek için birkaç soru soracağım. Bu konuda senin fikirlerin de bizim için çok kıymetli. Tüm sorularıma göstereceğin sabır için şimdiden çok teşekkür ederim. <b>Görüşme esnasında, kendini iyi hissetmez isen, kamera önünden çekilip anne-baban ve beni uzaktan seyredebilirsin. Dilersen başka odaya da geçebilirsin. Anne-babanın benimle görüşmesi için göstereceğin sabır için de çok teşekkür ederim.</b>
                        <br><br>
                        Önce de söylediğim gibi, bu görüşmedeki tek amacım senin sağlık durumun hakkında bilgi sahibi olabilmek ve bu görüntülü görüşmeden ne kadar memnun kaldığınızı öğrenebilmektir.
                        <br><br>
                        Eğer onay verirsen görüşmeyi başlatacağım. Verdiğin onaydan istediğin zaman vazgeçme hakkının olduğunu da söylemek isterim. Bana yardım ettiğin için çok teşekkür ederim.
                        <br><br>
                        Bir sonraki poliklinik kontrolünde görüşmek üzere.
                        <div class="text-right">
                        Açıklamaları yapan kişinin adı soyadı: <b>{{ \App\Models\Doctor::where('id', $doctor_id)->value('name') }}</b>
                        <br>
                        Tarih: <b>{{ date('d-m-Y') }}</b>
                        </div>
                        HASTA OLURU
                        <br>
                        Hastanın Adı Soyadı: <b>{{ \App\Models\User::where('id', $user_id)->value('name') }}</b>
                        <br>
                        Tarih: <b>{{ date('d-m-Y') }}</b>
                        <br>
                        <b>*</b><i>8 yaşından büyük hastalar onaylayacaktır.</i>
                      </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                      <a href="https://metabolizmateletip.ankara.edu.tr:90/{{ $room_name }}" class="btn btn-info" title="Görüşmeye Katıl" data-toggle="tooltip">Onaylıyorum</button></a>
                    </div>