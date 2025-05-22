<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	// Projeleri getiren bir fonksiyon olduğunu varsayalım
	// Bu fonksiyon, proje adı, kısa açıklaması, bir görseli ve detay sayfasına bir link gibi bilgiler içeren bir dizi döndürmeli
	// Örnek veri:
	/*
	$projelerResult = $cSorgu->getProjeler($_REQUEST); // Veya benzer bir fonksiyon çağrısı
	$projeler = $projelerResult['rows'];
	*/

	// Şimdilik statik örnek verilerle ilerleyelim:
	$projeler = [
		[
			'id' => 1,
			'adi' => 'Spor Tesisi Yenileme Projesi',
			'kisa_aciklama' => 'Mevcut spor tesislerimizin modernizasyonu ve kapasite artırımı üzerine odaklanan bir projedir.',
			'gorsel' => 'vexon/assets/img/projects/proje1.jpg', // Örnek görsel yolu
			'detay_link' => 'proje-detay.php?id=1'
		],
		[
			'id' => 2,
			'adi' => 'Genç Yetenekler Gelişim Programı',
			'kisa_aciklama' => 'Genç sporcuları keşfetmek ve onları profesyonel seviyeye taşımak için tasarlanmış kapsamlı bir program.',
			'gorsel' => 'vexon/assets/img/projects/proje2.jpg', // Örnek görsel yolu
			'detay_link' => 'proje-detay.php?id=2'
		],
		[
			'id' => 3,
			'adi' => 'Sağlıklı Yaşam Seminerleri',
			'kisa_aciklama' => 'Toplumda sağlıklı yaşam bilincini artırmak amacıyla düzenlenen bilgilendirici seminerler serisi.',
			'gorsel' => 'vexon/assets/img/projects/proje3.jpg', // Örnek görsel yolu
			'detay_link' => 'proje-detay.php?id=3'
		]
	];
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Projelerimiz - Spor Bul</title>
		<?php include "linkler.php"; ?> 
		<style type="text/css">
			.full-box-link {
			    display: block;
			    text-decoration: none;
			    color: inherit;
			}

			.project-card { /* Proje kartları için özel stil */
				background: #fff;
				border-radius: 10px;
				padding: 20px;
				margin-bottom: 30px;
				transition: 0.3s ease;
				box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Hafif bir gölge */
                display: flex; /* İçeriği yan yana getirmek için */
                flex-direction: column; /* İçeriği alt alta sıralamak için (varsayılan) */
                height: 100%; /* Kartların aynı yükseklikte olması için */
			}

            .project-card:hover {
                transform: translateY(-5px); /* Kartın üzerine gelince hafif yukarı kalkması */
                box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            }

			.project-card img.project-image {
				width: 100%;
				height: 200px; /* Sabit yükseklik */
				object-fit: cover; /* Resmin orantılı şekilde kutuya sığması */
				border-radius: 8px;
				margin-bottom: 15px;
			}

			.project-card .heading h4 {
				font-size: 1.25rem; /* 20px */
				margin-bottom: 10px;
                color: #333;
			}

			.project-card .description p {
				font-size: 0.9rem; /* 14.4px */
				color: #666;
				margin-bottom: 15px;
                flex-grow: 1; /* Açıklama alanının kalan boşluğu doldurması */
			}

            .project-card .read-more-btn {
                display: inline-block;
                padding: 8px 15px;
                background-color: #ffc107; /* temanızdaki warning rengi */
                color: #fff;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                transition: background-color 0.3s ease;
            }

            .project-card .read-more-btn:hover {
                background-color: #e0a800; /* Buton hover rengi */
            }

            /* Mevcut hakkimizda.php sayfanızdaki bazı stiller buraya da eklenebilir veya genel bir CSS dosyasında tutulabilir. */
            .inner-hero {
                padding: 80px 0; /* Hero alanı için padding */
            }
            .main-heading h1 {
                font-size: 2.5rem; /* Ana başlık boyutu */
                color: #fff; /* Başlık rengi (hero alanında) */
            }
            .page-prog a, .page-prog span, .page-prog p {
                color: #f0f0f0; /* Sayfa yolu rengi */
            }
            .sp { /* Section padding */
                padding-top: 60px;
                padding-bottom: 60px;
            }
            .heading1 h2 { /* "Projelerimiz" gibi bölüm başlıkları */
                font-size: 2rem;
                margin-bottom: 30px;
                text-align: center;
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
			<?php // Preloader HTML'i buraya gelebilir, hakkimizda.php'deki gibi ?>
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
								<p class="bold">Projelerimiz</p>
							</div>
							<h1>Projelerimiz</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="projects-page-sec sp"> 
			<div class="container">
				<div class="row">
					<div class="col-lg-10 m-auto"> 
						<div class="heading1 text-center mb-5"> 
							<h2>Tüm Projelerimiz</h2>
							<p class="mt-16">Sporbul olarak hayata geçirdiğimiz ve devam eden projelerimizi aşağıda bulabilirsiniz.</p>
						</div>
					</div>
                </div>
                <div class="row">
                    <?php if (!empty($projeler)): ?>
                        <?php foreach ($projeler as $proje): ?>
                            <div class="col-lg-4 col-md-6 mb-4"> 
                                <div class="project-card">
                                    <?php if (!empty($proje['gorsel'])): ?>
                                        <img src="<?php echo htmlspecialchars($proje['gorsel']); ?>" alt="<?php echo htmlspecialchars($proje['adi']); ?>" class="project-image">
                                    <?php endif; ?>
                                    <div class="heading">
                                        <h4><?php echo htmlspecialchars($proje['adi']); ?></h4>
                                    </div>
                                    <div class="description">
                                        <p><?php echo nl2br(htmlspecialchars($proje['kisa_aciklama'])); ?></p>
                                    </div>
                                    <?php if (!empty($proje['detay_link'])): ?>
                                        <a href="<?php echo htmlspecialchars($proje['detay_link']); ?>" class="read-more-btn">Detayları Gör</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-center">Şu anda gösterilecek bir proje bulunmamaktadır.</p>
                        </div>
                    <?php endif; ?>
                </div>
			</div>
		</div>

		<?php include "footer.php"; ?>
		<?php include "scripts.php"; ?>
	</body>
</html>