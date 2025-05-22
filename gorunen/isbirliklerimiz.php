<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	// İşbirliklerini getiren bir fonksiyon olduğunu varsayalım
	// $isbirlikleriResult = $cSorgu->getIsbirlikleri($_REQUEST);
	// $isbirlikleri = $isbirlikleriResult['rows'];

	// Şimdilik statik örnek verilerle ilerleyelim:
	$isbirlikleri = [
		[
			'id' => 1,
			'kurum_adi' => 'Ulusal Gençlik ve Spor Federasyonu',
			'logo' => 'vexon/assets/img/partners/federasyon_logo.png',
			'aciklama' => 'Gençlik spor projelerinde ve ulusal turnuvalarda stratejik ortağımız.',
			'web_sitesi' => 'https://www.ornekfederasyon.gov.tr'
		],
		[
			'id' => 2,
			'kurum_adi' => 'Sağlıklı Yaşam Derneği',
			'logo' => 'vexon/assets/img/partners/syd_logo.png',
			'aciklama' => 'Toplum sağlığı ve spor bilincinin artırılmasına yönelik ortak seminer ve etkinlikler düzenlemekteyiz.',
			'web_sitesi' => 'https://www.ornekdernek.org'
		],
		[
			'id' => 3,
			'kurum_adi' => 'Yerel Spor Kulüpleri Birliği',
			'logo' => 'vexon/assets/img/partners/kulupbirligi_logo.svg',
			'aciklama' => 'Yerel spor tesislerinin geliştirilmesi ve amatör sporun desteklenmesi konusunda işbirliği yapıyoruz.',
			'web_sitesi' => '#'
		],
        [
			'id' => 4,
			'kurum_adi' => 'TeknoSpor Ekipmanları A.Ş.',
			'logo' => 'vexon/assets/img/partners/teknospor_logo.jpg',
			'aciklama' => 'Sporcularımıza modern ve kaliteli ekipman tedariki konusunda destekçimiz.',
			'web_sitesi' => 'https://www.teknospor.com'
		]
	];
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>İşbirliklerimiz - Spor Bul</title>
		<?php include "linkler.php"; ?>
		<style type="text/css">
            .partner-card {
				background: #fff;
				border-radius: 10px;
				padding: 25px;
				margin-bottom: 30px;
				transition: 0.3s ease;
				box-shadow: 0 4px 8px rgba(0,0,0,0.08);
                text-align: center;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
			}

            .partner-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 16px rgba(0,0,0,0.12);
            }

			.partner-card img.partner-logo {
				max-width: 150px;
				max-height: 80px;
                height: auto;
				margin: 0 auto 20px auto;
                object-fit: contain;
			}

			.partner-card .heading h5 {
				font-size: 1.1rem;
				margin-bottom: 10px;
                color: #333;
			}

			.partner-card .description p {
				font-size: 0.85rem;
				color: #666;
				margin-bottom: 15px;
                flex-grow: 1;
			}
            .partner-card .website-link {
                font-size: 0.9rem;
                font-weight: bold;
                color: #ffc107;
                text-decoration: none;
            }
            .partner-card .website-link:hover {
                text-decoration: underline;
            }

            .inner-hero { padding: 80px 0; }
            .main-heading h1 { font-size: 2.5rem; color: #fff; }
            .page-prog a, .page-prog span, .page-prog p { color: #f0f0f0; }
            .sp { padding-top: 60px; padding-bottom: 60px; }
            .heading1 h2 { font-size: 2rem; margin-bottom: 30px; text-align: center; }
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
								<p class="bold">İşbirliklerimiz</p>
							</div>
							<h1>Değerli İş Ortaklarımız</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="partners-page-sec sp">
			<div class="container">
                <div class="row">
					<div class="col-lg-10 m-auto">
						<div class="heading1 text-center mb-5">
							<h2>Birlikte Güçlüyüz</h2>
							<p class="mt-16">Hedeflerimize ulaşmamızda bize destek olan, vizyonumuzu paylaşan değerli kurum ve kuruluşlar.</p>
						</div>
					</div>
                </div>
				<div class="row">
                    <?php if (!empty($isbirlikleri)): ?>
                        <?php foreach ($isbirlikleri as $isbirligi): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="partner-card">
                                    <div> 
                                        <?php if (!empty($isbirligi['logo'])): ?>
                                            <img src="<?php echo htmlspecialchars($isbirligi['logo']); ?>" alt="<?php echo htmlspecialchars($isbirligi['kurum_adi']); ?> Logo" class="partner-logo">
                                        <?php endif; ?>
                                        <div class="heading">
                                            <h5><?php echo htmlspecialchars($isbirligi['kurum_adi']); ?></h5>
                                        </div>
                                    </div>
                                    <div> 
                                        <?php if (!empty($isbirligi['aciklama'])): ?>
                                        <div class="description">
                                            <p><?php echo nl2br(htmlspecialchars($isbirligi['aciklama'])); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (!empty($isbirligi['web_sitesi']) && $isbirligi['web_sitesi'] !== '#'): ?>
                                            <a href="<?php echo htmlspecialchars($isbirligi['web_sitesi']); ?>" class="website-link" target="_blank">Web Sitesini Ziyaret Et <i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-center">Şu anda gösterilecek bir işbirliği bulunmamaktadır.</p>
                        </div>
                    <?php endif; ?>
                </div>
			</div>
		</div>

		<?php include "footer.php"; ?>
		<?php include "scripts.php"; ?>
	</body>
</html>