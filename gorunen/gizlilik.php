<?
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	$result     	= $cSorgu->getBloglar($_REQUEST);
    $rows       	= $result['rows'];

    $delays = [100, 300, 400, 500, 250, 300, 350, 400, 450];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Spor Bul - Gizlilik</title>
		<?include "linkler.php" ?>
	</head>
	<style type="text/css">
		.select2-container--default .select2-selection--single {
		  height: 38px; /* form-control yüksekliği ile uyumlu */
		  padding: 6px 12px;
		  border: 1px solid #ced4da;
		  border-radius: .25rem;
		  font-size: 1rem;
		  line-height: 1.5;
		}
		.select2-container--default .select2-selection--single .select2-selection__rendered {
		  padding-left: 0;
		  padding-right: 0;
		}
	</style>
	<body>
		<div class="paginacontainer">
			<div class="progress-wrap">
				<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
					<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
				</svg>
			</div>
		</div>
		<div class="sec-preloader">
			<div class="overlay-preloader flex cac vac" id="preloader">
				<div>
					<div class="loader preloader flex vac">
						<svg width="200" height="200">
							<circle class="background" cx="90" cy="90" r="80" transform="rotate(-90, 100, 90)" />
							<circle class="outer" cx="90" cy="90" r="80" transform="rotate(-90, 100, 90)" />
						</svg>
						<span class="circle-background"></span>
						<span class="logo animated fade-in"> </span>
					</div>
				</div>
			</div>
		</div>
		<?include "header.php"; ?>
		<div class="inner-hero bg-cover" style="background-color: #a0a2b3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-heading">
							<div class="page-prog">
								<a href="index.html">Anasayfa</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Gizlilik</p>
							</div>
							<h1>Gizlilik</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blog-page-sec mt-5">
			<div class="container">
			    
			    
			    
		<div class="row" data-aos="fade-up" data-aos-duration="600">
  <div class="col-lg-10 offset-lg-1">
    <div style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
      
      <h4 class="mt-4">1. GİRİŞ</h4>
      <p>SPORBUL olarak, kullanıcılarımızın kişisel verilerinin gizliliğini ve güvenliğini korumayı temel ilkelerimizden biri olarak kabul ediyoruz. Bu Gizlilik Politikası, yürürlükteki yasal mevzuata uygun olarak hazırlanmıştır.</p>
      <p>SPORBUL, İstanbul'da spor etkinliklerine erişimi kolaylaştırmayı amaçlayan bir sosyal girişim platformudur.</p>

      <h4 class="mt-4">2. HANGİ VERİLERİ TOPLUYORUZ?</h4>
      <p><strong>a) Kullanıcı Tarafından Sağlanan Veriler:</strong></p>
      <ul>
        <li>Ad, soyad</li>
        <li>E-posta adresi</li>
        <li>İl/ilçe bilgisi</li>
        <li>Profil fotoğrafı (isteğe bağlı)</li>
        <li>Etkinlik tercihleri</li>
        <li>Geri bildirim ve yorumlar</li>
      </ul>
      <p><strong>b) Otomatik Olarak Toplanan Veriler:</strong></p>
      <ul>
        <li>IP adresi</li>
        <li>Cihaz/tarayıcı bilgileri</li>
        <li>Konum bilgisi (kullanıcı onayı ile)</li>
        <li>Sayfa görüntüleme verileri</li>
        <li>Çerezler (cookie)</li>
      </ul>

      <h4 class="mt-4">3. VERİLERİN İŞLENME AMAÇLARI</h4>
      <ul>
        <li>Konuma uygun spor etkinliği önerileri sunmak</li>
        <li>Kişiselleştirilmiş kullanıcı deneyimi sağlamak</li>
        <li>Etkinlik analizi ve raporlaması yapmak</li>
        <li>E-posta bildirimi ve duyuru göndermek</li>
        <li>Gönüllü eşleştirme sistemini yürütmek</li>
        <li>Anonim verilerle istatistiksel analiz gerçekleştirmek</li>
        <li>Platformun teknik altyapısını güçlendirmek</li>
      </ul>

      <h4 class="mt-4">4. VERİLERİN SAKLAMA SÜRESİ</h4>
      <p>Kişisel veriler, gerekli olan süre boyunca saklanır. Saklama süresi sona erdiğinde veriler silinir, yok edilir ya da anonim hale getirilir.</p>

      <h4 class="mt-4">5. VERİLERE KİMLER ERİŞEBİLİR?</h4>
      <ul>
        <li>Teknik destek sağlayıcılar</li>
        <li>Gerekli durumlarda yasal merciler</li>
        <li>Kullanıcının izniyle iş birliği yapılan spor kurum ve kuruluşları</li>
      </ul>

      <h4 class="mt-4">6. ÇEREZ POLİTİKASI</h4>
      <p>SPORBUL web sitesi çerez (cookie) teknolojisi kullanır. Bu çerezler:</p>
      <ul>
        <li>Kullanıcı tercihlerini hatırlamak</li>
        <li>Sitenin kullanımını analiz etmek</li>
        <li>İçeriği kişiselleştirmek</li>
      </ul>
      <p>Tarayıcınızdan çerez ayarlarını kontrol edebilir veya devre dışı bırakabilirsiniz.</p>

      <h4 class="mt-4">7. VERİ GÜVENLİĞİ</h4>
      <ul>
        <li>SSL ile güvenli bağlantı</li>
        <li>Şifreli veri tabanı sistemleri</li>
        <li>Güncel güvenlik yazılımları</li>
        <li>Erişim kontrolü</li>
      </ul>

      <h4 class="mt-4">8. KULLANICILARIN HAKLARI</h4>
      <ul>
        <li>Kişisel verilerine erişim talep etme</li>
        <li>Verilerde düzeltme yapılmasını isteme</li>
        <li>Verilerin silinmesini talep etme</li>
        <li>Verilerin işlenmesine ilişkin itirazda bulunma</li>
        <li>Verilerinin taşınmasını talep etme</li>
      </ul>

      <h4 class="mt-4">9. ÜÇÜNCÜ TARAF BAĞLANTILAR</h4>
      <p>SPORBUL platformu, üçüncü taraf sitelere yönlendirme içerebilir. Bu sitelerin gizlilik uygulamalarından SPORBUL sorumlu değildir.</p>

      <h4 class="mt-4">10. POLİTİKA DEĞİŞİKLİKLERİ</h4>
      <p>Bu Gizlilik Politikası zaman zaman güncellenebilir. Güncellenmiş hali <a href="http://www.sporbul.org/index.php" target="_blank">www.sporbul.org</a> adresinde yayımlanır ve yayımlandığı tarihte yürürlüğe girer.</p>

      <h4 class="mt-4">İLETİŞİM</h4>
      <ul>
        <li><strong>Adres:</strong> İstanbul</li>
        <li><strong>E-Posta:</strong> <a href="mailto:sporbul@gmail.com">sporbul@gmail.com</a></li>
        <li><strong>Telefon:</strong> 0505 472 3802</li>
        <li><strong>Web:</strong> <a href="http://www.sporbul.org/index.php" target="_blank">www.sporbul.org</a></li>
      </ul>
    </div>
  </div>
</div>



				
			</div>
		</div>
		<?include "footer.php";?>
		<?include "scripts.php";?>
	</body>
</html>
