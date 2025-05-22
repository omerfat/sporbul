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
		<title> Spor Bul - Çerez Politikası</title>
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
								<p class="bold">Çerez Politikası</p>
							</div>
							<h1>Çerez Politikası</h1>
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
      

      <h4 class="mt-4">1. ÇEREZ NEDİR?</h4>
      <p>Çerezler, SPORBUL web sitesini veya mobil uygulamasını ziyaret ettiğinizde tarayıcınız aracılığıyla cihazınıza kaydedilen küçük metin dosyalarıdır. Bu çerezler sayesinde kullanıcı deneyiminizi iyileştirir, hizmetlerimizi daha işlevsel ve erişilebilir hale getiririz.</p>

      <h4 class="mt-4">2. HANGİ ÇEREZLERİ KULLANIYORUZ?</h4>

      <p><strong>A. Zorunlu Çerezler</strong></p>
      <ul>
        <li>Giriş ve oturum yönetimi</li>
        <li>Güvenlik kontrolleri</li>
        <li>Form işlemleri</li>
      </ul>

      <p><strong>B. İşlevsel Çerezler</strong></p>
      <ul>
        <li>Tercih edilen spor kategorileri</li>
        <li>Konuma göre öneriler</li>
        <li>Kayıtlı etkinlikler</li>
      </ul>

      <p><strong>C. Analitik ve Performans Çerezleri</strong></p>
      <ul>
        <li>Ziyaret süresi ve davranış takibi</li>
        <li>En çok görüntülenen etkinlik kategorileri</li>
        <li>Google Analytics ve benzeri araçlar</li>
      </ul>

      <p><strong>D. Reklam ve Hedefleme Çerezleri</strong></p>
      <ul>
        <li>Facebook Pixel</li>
        <li>Google Ads</li>
        <li>Etkinlik tanıtımı optimizasyonu</li>
      </ul>

      <h4 class="mt-4">3. ÇEREZLERİN SAKLAMA SÜRESİ</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Çerez Türü</th>
            <th>Saklama Süresi</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Oturum Çerezleri</td><td>Tarayıcı kapanana kadar</td></tr>
          <tr><td>Kalıcı Çerezler</td><td>1 gün – 12 ay</td></tr>
          <tr><td>Analitik Çerezler</td><td>6 – 24 ay</td></tr>
        </tbody>
      </table>

      <h4 class="mt-4">4. ÇEREZLERİ NASIL KONTROL EDEBİLİRSİNİZ?</h4>
      <p>Tarayıcı ayarlarınız üzerinden çerezleri yönetebilir veya silebilirsiniz. İşte bazı tarayıcılar için yollar:</p>
      <ul>
        <li><strong>Chrome:</strong> Ayarlar > Gizlilik ve güvenlik > Çerezler</li>
        <li><strong>Firefox:</strong> Ayarlar > Gizlilik ve Güvenlik > Çerezler</li>
        <li><strong>Safari:</strong> Tercihler > Gizlilik > Web Sitesi Verilerini Yönet</li>
        <li><strong>Edge:</strong> Ayarlar > Çerezler ve site izinleri</li>
      </ul>
      <p><em>Not: Zorunlu çerezlerin engellenmesi bazı platform işlevlerini etkileyebilir.</em></p>

      <h4 class="mt-4">5. ÜÇÜNCÜ TARAF ÇEREZLER</h4>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Sağlayıcı</th>
            <th>Amaç</th>
            <th>Gizlilik Politikası</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Google Analytics</td>
            <td>Trafik ve davranış analizi</td>
            <td><a href="https://policies.google.com/privacy?hl=tr" target="_blank">Gizlilik Politikası</a></td>
          </tr>
          <tr>
            <td>Facebook Pixel</td>
            <td>Sosyal medya kampanyaları</td>
            <td><a href="https://www.facebook.com/privacy/policy" target="_blank">Gizlilik Politikası</a></td>
          </tr>
          <tr>
            <td>YouTube Embed</td>
            <td>Video içerik gösterimi</td>
            <td><a href="https://policies.google.com/technologies/cookies" target="_blank">Çerezler</a></td>
          </tr>
        </tbody>
      </table>

      <h4 class="mt-4">6. KİŞİSEL VERİLERİN KORUNMASI</h4>
      <p>Çerezler aracılığıyla toplanan kişisel veriler yalnızca hizmet kalitemizi artırmak amacıyla kullanılır. Bu veriler KVKK ve GDPR kapsamında korunur, açık rıza olmadan üçüncü taraflarla paylaşılmaz.</p>
      <p>Detaylı bilgi için <a href="/gizlilik">Gizlilik Politikamızı</a> inceleyebilirsiniz.</p>

      <h4 class="mt-4">7. GÜNCELLEMELER</h4>
      <p>Çerez politikası teknolojik gelişmeler ve yasal düzenlemeler doğrultusunda güncellenebilir. Güncellenmiş hali bu sayfada yayımlandığı tarihten itibaren geçerli olur.</p>

      <h4 class="mt-4">İLETİŞİM</h4>
      <ul>
        <li><strong>E-Posta:</strong> <a href="mailto:sporbul@gmail.com">sporbul@gmail.com</a></li>
        <li><strong>Web:</strong> <a href="http://www.sporbul.org/index.php" target="_blank">www.sporbul.org</a></li>
        <li><strong>Telefon:</strong> +90 505 472 3802</li>
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
