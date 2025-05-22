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
		<title> Spor Bul - Kullanıcı Sözleşmesi</title>
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
								<p class="bold">Kullanıcı Sözleşmesi</p>
							</div>
							<h1>Kullanıcı Sözleşmesi</h1>
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


      <h4 class="mt-4">1. Taraflar</h4>
      <p>Bu sözleşme, SPORBUL web sitesi ve mobil uygulamasını kullanan kullanıcılar ile SPORBUL Proje Ekibi arasında elektronik ortamda akdedilmiştir.</p>

      <h4 class="mt-4">2. Hizmet Tanımı</h4>
      <p>SPORBUL, İstanbul genelinde ücretsiz veya düşük maliyetli spor etkinliklerine erişimi sağlayan bir dijital platformdur. Sağlanan hizmetler:</p>
      <ul>
        <li>Spor etkinliklerini arama ve filtreleme</li>
        <li>Etkinliğe katılım ve geri bildirim verme</li>
        <li>Gönüllü spor faaliyetlerine başvuru</li>
        <li>Sosyal medya ve mobil uygulama entegrasyonu</li>
      </ul>

      <h4 class="mt-4">3. Kullanım Koşulları</h4>
      <ul>
        <li>Kullanıcı platformu yalnızca yasal amaçlarla kullanmalıdır.</li>
        <li>SPORBUL, içerik ve hizmetleri değiştirme hakkını saklı tutar.</li>
        <li>Kullanıcı sağladığı bilgilerin doğruluğundan sorumludur.</li>
      </ul>

      <h4 class="mt-4">4. Kullanıcı Yükümlülükleri</h4>
      <ul>
        <li>Yasa dışı, yanıltıcı, zararlı, ayrımcı içerikler paylaşmamak</li>
        <li>Sistem güvenliğini tehdit edecek eylemlerde bulunmamak</li>
        <li>Sahte hesap oluşturmamak</li>
        <li>Telif hakkı kendisine ait olmayan içerikleri izinsiz kullanmamak</li>
      </ul>

      <h4 class="mt-4">5. Fikri Mülkiyet Hakları</h4>
      <p>Platforma ait yazılım, tasarım, logo ve içerikler SPORBUL’a aittir. Kişisel kullanım dışında çoğaltılamaz veya ticari amaçla kullanılamaz.</p>

      <h4 class="mt-4">6. Gizlilik ve Veri Koruma</h4>
      <p>Kullanıcı verileri sadece hizmet geliştirme amacıyla kullanılır. Veriler yalnızca açık onayla ya da yasal zorunluluk halinde paylaşılır. Finansal veri toplanmaz. Ayrıntılar için <a href="gizlilik.php">Gizlilik Politikası</a> sayfası incelenebilir.</p>

      <h4 class="mt-4">7. Sorumluluk Sınırlaması</h4>
      <p>SPORBUL, organizatör kaynaklı iptallerden ve dış bağlantılardaki içeriklerden sorumlu değildir.</p>

      <h4 class="mt-4">8. Hesap Kullanımı ve Güvenlik</h4>
      <p>Kullanıcı, hesabının güvenliğini sağlamakla yükümlüdür. Tüm hesap hareketlerinden kendisi sorumludur.</p>

      <h4 class="mt-4">9. Sözleşmenin Sona Ermesi</h4>
      <p>Kullanıcı dilediği zaman üyeliğini sonlandırabilir. SPORBUL, kuralları ihlal eden kullanıcıların erişimini iptal etme hakkına sahiptir.</p>

      <h4 class="mt-4">10. Değişiklikler ve Yürürlük</h4>
      <p>SPORBUL, bu sözleşmeyi güncelleyebilir. Yayın tarihi itibarıyla yürürlüğe girer.</p>

      <h4 class="mt-4">11. Uyuşmazlık Çözümü</h4>
      <p>İstanbul (Merkez) Mahkemeleri ve İcra Daireleri yetkilidir.</p>

      <h4 class="mt-4">İletişim</h4>
      <ul>
        <li><strong>Adres:</strong> İstanbul</li>
        <li><strong>Telefon:</strong> 0505 472 3802</li>
        <li><strong>E-Posta:</strong> <a href="mailto:sporbul@gmail.com">sporbul@gmail.com</a></li>
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
