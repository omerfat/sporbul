<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	// Yayınları getiren bir fonksiyon olduğunu varsayalım
	// Örnek veri:
	/*
	$yayinlarResult = $cSorgu->getYayinlar($_REQUEST); // Veya benzer bir fonksiyon çağrısı
	$yayinlar = $yayinlarResult['rows'];
	*/

	// Şimdilik statik örnek verilerle ilerleyelim:
	$yayinlar = [
		[
			'id' => 1,
			'baslik' => 'Spor ve Sağlıklı Yaşam Üzerine Makaleler Derlemesi',
			'kisa_ozet' => 'Bu derleme, sporun fiziksel ve zihinsel sağlık üzerindeki olumlu etkilerini inceleyen güncel makaleleri bir araya getirmektedir.',
			'gorsel' => 'vexon/assets/img/publications/yayin1.jpg', // Örnek görsel yolu
			'dosya_link' => 'dosyalar/yayinlar/makale_derlemesi_2024.pdf', // Örnek dosya yolu veya detay sayfası linki
            'yayin_tarihi' => '2024-03-15'
		],
		[
			'id' => 2,
			'baslik' => 'Genç Sporcular İçin Beslenme Rehberi',
			'kisa_ozet' => 'Genç sporcuların performanslarını artırmak ve sağlıklı gelişimlerini desteklemek için hazırlanmış kapsamlı bir beslenme rehberi.',
			'gorsel' => 'vexon/assets/img/publications/yayin2.jpg', // Örnek görsel yolu
			'dosya_link' => 'yayin-detay.php?id=2',
            'yayin_tarihi' => '2023-11-01'
		],
		[
			'id' => 3,
			'baslik' => 'Spor Sakatlıkları ve Önleme Yöntemleri Kitapçığı',
			'kisa_ozet' => 'Sık karşılaşılan spor sakatlıklarını ve bu sakatlıklardan korunma yöntemlerini içeren pratik bir kitapçık.',
			'gorsel' => 'vexon/assets/img/publications/yayin3.jpg', // Örnek görsel yolu
			'dosya_link' => 'dosyalar/yayinlar/sakatlik_kitapcigi.pdf',
            'yayin_tarihi' => '2023-07-20'
		]
	];
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Yayınlarımız - Spor Bul</title>
		<?php include "linkler.php"; ?>
		<style type="text/css">
			.publication-card {
				background: #fff;
				border-radius: 10px;
				padding: 20px;
				margin-bottom: 30px;
				transition: 0.3s ease;
				box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                display: flex;
                flex-direction: column;
                height: 100%;
			}

            .publication-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            }

			.publication-card img.publication-image {
				width: 100%;
				height: 200px;
				object-fit: cover;
				border-radius: 8px;
				margin-bottom: 15px;
			}

			.publication-card .heading h4 {
				font-size: 1.25rem;
				margin-bottom: 10px;
                color: #333;
			}

            .publication-card .publication-meta {
                font-size: 0.8rem;
                color: #777;
                margin-bottom: 10px;
            }

			.publication-card .summary p {
				font-size: 0.9rem;
				color: #666;
				margin-bottom: 15px;
                flex-grow: 1;
			}

            .publication-card .read-more-btn {
                display: inline-block;
                padding: 8px 15px;
                background-color: #007bff; /* Farklı bir renk deneyelim (primary) */
                color: #fff;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                transition: background-color 0.3s ease;
            }

            .publication-card .read-more-btn:hover {
                background-color: #0056b3;
            }

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
            .heading1 h2 {
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
								<p class="bold">Yayınlarımız</p>
							</div>
							<h1>Yayınlarımız</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="publications-page-sec sp">
			<div class="container">
                <div class="row">
					<div class="col-lg-10 m-auto">
						<div class="heading1 text-center mb-5">
							<h2>Tüm Yayınlarımız</h2>
							<p class="mt-16">Spor ve sağlık alanındaki yayınlarımızı, makalelerimizi ve rehberlerimizi buradan inceleyebilirsiniz.</p>
						</div>
					</div>
                </div>
				<div class="row">
                    <?php if (!empty($yayinlar)): ?>
                        <?php foreach ($yayinlar as $yayin): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="publication-card">
                                    <?php if (!empty($yayin['gorsel'])): ?>
                                        <img src="<?php echo htmlspecialchars($yayin['gorsel']); ?>" alt="<?php echo htmlspecialchars($yayin['baslik']); ?>" class="publication-image">
                                    <?php endif; ?>
                                    <div class="heading">
                                        <h4><?php echo htmlspecialchars($yayin['baslik']); ?></h4>
                                    </div>
                                    <?php if (!empty($yayin['yayin_tarihi'])): ?>
                                        <div class="publication-meta">
                                            <i class="fa-regular fa-calendar-alt"></i> Yayın Tarihi: <?php echo date("d.m.Y", strtotime(htmlspecialchars($yayin['yayin_tarihi']))); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="summary">
                                        <p><?php echo nl2br(htmlspecialchars($yayin['kisa_ozet'])); ?></p>
                                    </div>
                                    <?php if (!empty($yayin['dosya_link'])): ?>
                                        <a href="<?php echo htmlspecialchars($yayin['dosya_link']); ?>" class="read-more-btn" target="_blank">İncele / İndir</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-center">Şu anda gösterilecek bir yayın bulunmamaktadır.</p>
                        </div>
                    <?php endif; ?>
                </div>
			</div>
		</div>

		<?php include "footer.php"; ?>
		<?php include "scripts.php"; ?>
	</body>
</html>