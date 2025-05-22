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
		<title> Spor Bul - Aydınlatma Metni</title>
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
								<p class="bold">Aydınlatma Metni</p>
							</div>
							<h1>Aydınlatma Metni</h1>
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
     

      <h4 class="mt-4">1. Veri Sorumlusu Hakkında</h4>
      <p>6698 sayılı KVKK kapsamında, kişisel verileriniz veri sorumlusu sıfatıyla SPORBUL tarafından işlenebilir.</p>
      <ul>
        <li><strong>E-Posta:</strong> sporbul@gmail.com</li>
        <li><strong>Telefon:</strong> 0505 472 3802</li>
        <li><strong>Adres:</strong> İstanbul</li>
      </ul>

      <h4 class="mt-4">2. Kişisel Verilerinizin Hangi Amaçla İşlendiği</h4>
      <ul>
        <li>Ücretsiz veya düşük maliyetli etkinliklerin sunulması</li>
        <li>Konuma uygun öneriler sunulması</li>
        <li>Gönüllü başvuruları ve kullanıcı hesabı yönetimi</li>
        <li>Bildirim, e-bülten, iletişim süreçleri</li>
        <li>İstatistik oluşturulması ve geri bildirimlerin değerlendirilmesi</li>
      </ul>

      <h4 class="mt-4">3. İşlenen Kişisel Veri Türleri</h4>
      <ul>
        <li>Kimlik: Ad, soyad</li>
        <li>İletişim: E-posta, telefon (isteğe bağlı)</li>
        <li>Konum: İl/ilçe (isteğe bağlı)</li>
        <li>İşlem: Etkinlik katılım, tercih ve yorumlar</li>
        <li>Teknik: IP, cihaz türü, tarayıcı, çerezler</li>
        <li>Görsel: Etkinlik fotoğrafları (isteğe bağlı)</li>
      </ul>

      <h4 class="mt-4">4. Veri Toplama Yöntemi ve Hukuki Sebep</h4>
      <p>Kişisel verileriniz şu yollarla toplanır:</p>
      <ul>
        <li>Formlar, çerezler, mobil/web platformlar</li>
        <li>Sosyal medya bağlantıları</li>
      </ul>
      <p><strong>Hukuki Sebepler:</strong> Açık rıza (m.5/1), sözleşme (m.5/2-c), meşru menfaat (m.5/2-f), yasal zorunluluk (m.5/2-ç)</p>

      <h4 class="mt-4">5. Verilerin Aktarıldığı Taraflar</h4>
      <ul>
        <li>Barındırma, analiz ve e-posta hizmet sağlayıcıları</li>
        <li>Yasal zorunluluklar halinde kamu kurumları</li>
        <li>Kullanıcının açık rızasıyla: belediyeler, kulüpler, organizatörler</li>
      </ul>
      <p>Veriler ticari amaçlarla paylaşılmaz veya satılmaz.</p>

      <h4 class="mt-4">6. Saklama Süresi</h4>
      <p>Verileriniz yasal süreler boyunca veya amacına uygun süreyle saklanır. Süre dolunca silinir, yok edilir ya da anonimleştirilir.</p>

      <h4 class="mt-4">7. KVKK Kapsamındaki Haklarınız</h4>
      <ul>
        <li>Verinizin işlenip işlenmediğini öğrenme</li>
        <li>İşlenmişse buna dair bilgi talep etme</li>
        <li>Amacına uygun kullanılıp kullanılmadığını öğrenme</li>
        <li>Yurtiçi/yurtdışı aktarım yapılan kişileri bilme</li>
        <li>Düzeltme, silme, yok etme talep etme</li>
        <li>Otomatik sistem analizlerine itiraz etme</li>
        <li>Hak ihlali halinde tazminat talep etme</li>
      </ul>

      <h4 class="mt-4">8. Başvuru Yöntemi</h4>
      <p><strong>Başvuru Adresi:</strong> <a href="mailto:sporbul@gmail.com">sporbul@gmail.com</a></p>
      <p>Talepleriniz KVKK madde 13 kapsamında, en geç 30 gün içinde ücretsiz olarak yanıtlanır.</p>
    </div>
  </div>
</div>

	


				
			</div>
		</div>
		<?include "footer.php";?>
		<?include "scripts.php";?>
	</body>
</html>
