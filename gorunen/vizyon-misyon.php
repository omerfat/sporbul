<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	// Bu sayfa için genellikle veritabanından çekilecek çok fazla dinamik içerik olmaz.
	// Metinler doğrudan HTML içine yazılabilir veya bir CMS'ten yönetiliyorsa oradan çekilebilir.
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Vizyon & Misyon - Spor Bul</title>
		<?php include "linkler.php"; ?>
		<style type="text/css">
            .inner-hero {
                padding: 80px 0;
            }
            .main-heading h1 {
                font-size: 2.5rem;
                color: #fff;
            }
            .page-prog a, .page-prog span, .page-prog p {
                color: #f0f0f0;
            }
            .sp {
                padding-top: 60px;
                padding-bottom: 60px;
            }
            .content-section h2 { /* "Vizyonumuz", "Misyonumuz" başlıkları */
                font-size: 1.8rem; /* Biraz daha küçük olabilir */
                margin-top: 40px;
                margin-bottom: 15px;
                color: #333;
            }
            .content-section p {
                font-size: 1rem;
                line-height: 1.6;
                color: #555;
                margin-bottom: 20px;
            }
            .content-section ul {
                list-style: disc;
                margin-left: 20px;
                margin-bottom: 20px;
            }
            .content-section ul li {
                margin-bottom: 8px;
            }
		</style>
	</head>
	<body>
		<div class="paginacontainer">
			<div class="progress-wrap">
				<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
					<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
				</svg>
			</div>
		</div>
		<div class="sec-preloader">
			<?php // Preloader HTML'i buraya gelebilir ?>
		</div>

		<?php include "header2.php"; ?>

		<div class="inner-hero bg-cover" style="background-color: #a0a2b3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-heading">
							<div class="page-prog">
								<a href="index.php">Anasayfa</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<a href="hakkimizda.php">Hakkımızda</a>
                                <span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Vizyon & Misyon</p>
							</div>
							<h1>Vizyonumuz ve Misyonumuz</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="vision-mission-sec sp">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 m-auto">
						<div class="content-section">
							<h2>Vizyonumuz</h2>
							<p>
								Spora, ilkelerimize ve değerlerimize bağlı kalarak, ihtiyacı olan insanlara spor alanlarında rehber olan ve yol gösteren gönüllülük hareketi olmaktır. Toplumun her kesiminden bireyin sporla tanışmasını ve sporu yaşam biçimi haline getirmesini teşvik ederek, daha sağlıklı, aktif ve bilinçli bir gelecek inşa etmeyi hedefleriz. Yenilikçi yaklaşımlarımız ve sürdürülebilir projelerimizle spor kültürünün yaygınlaşmasına öncülük etmek temel vizyonumuzdur.
							</p>
                            <p>
                                Sporun birleştirici gücüne inanarak, farklılıkları kucaklayan ve herkes için erişilebilir spor imkanları sunan bir platform olmayı amaçlıyoruz.
                            </p>
						</div>

                        <div class="content-section">
							<h2>Misyonumuz</h2>
							<p>
								Geleceği güzelleştirmek adına bağımsızca çalışarak spor faaliyetlerini yaygın hale getirmekle birlikte ideal spor ve sporcu bilincini oluşturabilmek için her türlü nitelikli ürün, bilgi ve hizmet üreten bir spor merkezi olmak. Misyonumuz doğrultusunda:
							</p>
                            <ul>
                                <li>Eğitim programları ve seminerler düzenleyerek spor bilincini artırmak.</li>
                                <li>Her yaş ve seviyeden bireye uygun spor olanakları sunmak.</li>
                                <li>Spor tesislerinin kalitesini ve erişilebilirliğini artırmak için çalışmalar yürütmek.</li>
                                <li>Etik değerlere bağlı kalarak adil rekabeti ve sportmenliği teşvik etmek.</li>
                                <li>Toplumsal fayda sağlayan projeler geliştirerek sporun sosyal sorumluluk yönünü güçlendirmek.</li>
                            </ul>
						</div>

                        <div class="content-section">
                            <h2>Temel Değerlerimiz</h2>
                            <ul>
                                <li><b>Gönüllülük:</b> Topluma fayda sağlama arzusuyla hareket etmek.</li>
                                <li><b>Erişilebilirlik:</b> Herkes için spor felsefesini benimsemek.</li>
                                <li><b>Kalite:</b> Sunduğumuz hizmet ve ürünlerde mükemmelliği hedeflemek.</li>
                                <li><b>Şeffaflık:</b> Tüm faaliyetlerimizde açık ve hesap verebilir olmak.</li>
                                <li><b>İşbirliği:</b> Ortak hedeflere ulaşmak için paydaşlarımızla güçlü ilişkiler kurmak.</li>
                                <li><b>Sürekli Gelişim:</b> Yenilikleri takip ederek kendimizi ve hizmetlerimizi sürekli iyileştirmek.</li>
                            </ul>
                        </div>
					</div>
				</div>
			</div>
		</div>

		<?php include "footer.php"; ?>
		<?php include "scripts.php"; ?>
	</body>
</html>