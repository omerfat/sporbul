<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');
	// require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/cSelect2.php');

	// Örnek cSelect2 ve diğer yardımcı fonksiyonlar (Sitenizde tanımlı olmalı)
	if (!class_exists('cSelect2')) {
		class cSelect2 {
			private $options = '';
			private $secilen = null;
			private $seciniz = false;
			public static function Ilceler($il_id = null) {
				$instance = new self();
				// Gerçek uygulamanızda bu veriler veritabanından gelmeli
				$ilceler = [1 => 'Merkez İlçe', 2 => 'Diğer İlçe A', 3 => 'Diğer İlçe B'];
				foreach ($ilceler as $id => $ad) {
					$instance->options .= "<option value=\"$id\">$ad</option>";
				}
				return $instance;
			}
			public static function EtkinlikTurleri() {
				$instance = new self();
				$turler = [
                    1 => 'Koşu', 2 => 'Bisiklet', 3 => 'Yoga', 4 => 'Futbol',
                    5 => 'Çocuk Etkinliği', 6 => 'Yürüyüş', 7 => 'Basketbol',
                    8 => 'Fitness', 9 => 'Voleybol', 10 => 'Kamp'
                ];
				foreach ($turler as $id => $ad) {
					$instance->options .= "<option value=\"$id\">$ad</option>";
				}
				return $instance;
			}
			public static function Durum() {
				$instance = new self();
				$instance->options = '<option value="1">Uygun</option><option value="0">Uygun Değil</option>';
				return $instance;
			}
			public function setSecilen($secilen) { $this->secilen = $secilen; return $this; } // Seçileni işaretleme mantığı eklenmeli
			public function setSeciniz() { $this->seciniz = true; return $this; }
			public function getSelect($valueField, $textField) {
				$html = '';
				if ($this->seciniz) { $html .= '<option value="">Tümü</option>'; }
				// setSecilen ile gelen değeri burada <option selected> olarak işaretlemelisiniz.
                // Basitlik adına bu örnekte tam implementasyon yapılmamıştır.
				$html .= $this->options;
				return $html;
			}
		}
	}

	$tumEtkinlikler = [
		['id' => 1, 'adi' => 'Bahar Maratonu', 'tur_id' => 1, 'tur_adi' => 'Koşu', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-05-20', 'saat' => '09:00', 'kisa_aciklama' => 'Şehrin en güzel parkurunda baharı koşarak karşılıyoruz. Her seviyeden katılımcıya açık!', 'resim_url' => 'https://picsum.photos/seed/event1/600/400', 'engelli_uygun' => 1],
		['id' => 2, 'adi' => 'Dağ Bisikleti Yarışı', 'tur_id' => 2, 'tur_adi' => 'Bisiklet', 'ilce_id' => 2, 'ilce_adi' => 'Diğer İlçe A', 'tarih' => '2025-06-10', 'saat' => '10:00', 'kisa_aciklama' => 'Adrenalin dolu bir dağ bisikleti deneyimi. Zorlu parkurlar ve muhteşem manzaralar.', 'resim_url' => 'https://picsum.photos/seed/event2/600/400', 'engelli_uygun' => 0],
		['id' => 3, 'adi' => 'Güneşin Doğuşu Yoga Kampı', 'tur_id' => 3, 'tur_adi' => 'Yoga', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-07-01', 'saat' => '05:30', 'kisa_aciklama' => 'Doğayla iç içe, huzurlu bir yoga deneyimi. Güne yenilenmiş başlayın.', 'resim_url' => 'https://picsum.photos/seed/event3/600/400', 'engelli_uygun' => 1],
		['id' => 4, 'adi' => 'Yaz Futbol Turnuvası', 'tur_id' => 4, 'tur_adi' => 'Futbol', 'ilce_id' => 3, 'ilce_adi' => 'Diğer İlçe B', 'tarih' => '2025-06-15', 'saat' => '14:00', 'kisa_aciklama' => 'Mahalleler arası dostluk futbol turnuvası. Takımını kur, sahaya çık!', 'resim_url' => 'https://picsum.photos/seed/event4/600/400', 'engelli_uygun' => 1],
		['id' => 5, 'adi' => 'Çocuklar İçin Spor Şenliği', 'tur_id' => 5, 'tur_adi' => 'Çocuk Etkinliği', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-05-25', 'saat' => '11:00', 'kisa_aciklama' => 'Çocuklara özel eğlenceli yarışmalar, oyunlar ve spor aktiviteleri.', 'resim_url' => 'https://picsum.photos/seed/event5/600/400', 'engelli_uygun' => 1],
		['id' => 6, 'adi' => 'Kıyı Şeridi Bisiklet Gezisi', 'tur_id' => 2, 'tur_adi' => 'Bisiklet', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-08-05', 'saat' => '09:30', 'kisa_aciklama' => 'Deniz manzarası eşliğinde keyifli ve herkese açık bir bisiklet turu.', 'resim_url' => 'https://picsum.photos/seed/event6/600/400', 'engelli_uygun' => 1],
		['id' => 7, 'adi' => 'Doğa Yürüyüşü & Meditasyon', 'tur_id' => 6, 'tur_adi' => 'Yürüyüş', 'ilce_id' => 2, 'ilce_adi' => 'Diğer İlçe A', 'tarih' => '2025-09-12', 'saat' => '08:00', 'kisa_aciklama' => 'Ormanın derinliklerinde rehber eşliğinde huzurlu bir yürüyüş ve meditasyon seansı.', 'resim_url' => 'https://picsum.photos/seed/event7/600/400', 'engelli_uygun' => 0],
		['id' => 8, 'adi' => 'Veteranlar Basketbol Maçı', 'tur_id' => 7, 'tur_adi' => 'Basketbol', 'ilce_id' => 3, 'ilce_adi' => 'Diğer İlçe B', 'tarih' => '2025-07-20', 'saat' => '18:00', 'kisa_aciklama' => 'Eski dostların ve efsane oyuncuların buluştuğu heyecanlı bir gösteri maçı.', 'resim_url' => 'https://picsum.photos/seed/event8/600/400', 'engelli_uygun' => 1],
		['id' => 9, 'adi' => 'Açık Hava Fitness Festivali', 'tur_id' => 8, 'tur_adi' => 'Fitness', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-06-01', 'saat' => '10:00', 'kisa_aciklama' => 'Tüm gün sürecek ücretsiz fitness dersleri, workshoplar ve sağlıklı yaşam standları.', 'resim_url' => 'https://picsum.photos/seed/event9/600/400', 'engelli_uygun' => 1],
		['id' => 10, 'adi' => 'Plaj Voleybolu Turnuvası', 'tur_id' => 9, 'tur_adi' => 'Voleybol', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-08-15', 'saat' => '13:00', 'kisa_aciklama' => 'Güneş, kum ve voleybol! Yazın en eğlenceli turnuvasına davetlisiniz.', 'resim_url' => 'https://picsum.photos/seed/event10/600/400', 'engelli_uygun' => 1],
		['id' => 11, 'adi' => 'Engelsiz Yaşam Koşusu', 'tur_id' => 1, 'tur_adi' => 'Koşu', 'ilce_id' => 2, 'ilce_adi' => 'Diğer İlçe A', 'tarih' => '2025-10-03', 'saat' => '10:00', 'kisa_aciklama' => 'Farkındalık yaratmak ve engelsiz yaşamı desteklemek için düzenlenen anlamlı bir koşu.', 'resim_url' => 'https://picsum.photos/seed/event11/600/400', 'engelli_uygun' => 1],
		['id' => 12, 'adi' => 'Doğa Macerası Kampı', 'tur_id' => 10, 'tur_adi' => 'Kamp', 'ilce_id' => 3, 'ilce_adi' => 'Diğer İlçe B', 'tarih' => '2025-09-25', 'saat' => '15:00', 'kisa_aciklama' => '2 gün sürecek, temel kampçılık eğitimleri ve doğa aktiviteleri içeren macera dolu bir kamp.', 'resim_url' => 'https://picsum.photos/seed/event12/600/400', 'engelli_uygun' => 0],
	];

	$filtrelenmisEtkinlikler = $tumEtkinlikler;

	if (!empty($_REQUEST['etkinlik_adi'])) {
		$filtrelenmisEtkinlikler = array_filter($filtrelenmisEtkinlikler, function($etkinlik) {
			return stripos($etkinlik['adi'], $_REQUEST['etkinlik_adi']) !== false;
		});
	}
	if (!empty($_REQUEST['ilce_id'])) {
		$filtrelenmisEtkinlikler = array_filter($filtrelenmisEtkinlikler, function($etkinlik) {
			return $etkinlik['ilce_id'] == $_REQUEST['ilce_id'];
		});
	}
	if (!empty($_REQUEST['tur_id'])) {
		$filtrelenmisEtkinlikler = array_filter($filtrelenmisEtkinlikler, function($etkinlik) {
			return $etkinlik['tur_id'] == $_REQUEST['tur_id'];
		});
	}
	if (isset($_REQUEST['engelli_uygun']) && $_REQUEST['engelli_uygun'] !== '') {
		$filtrelenmisEtkinlikler = array_filter($filtrelenmisEtkinlikler, function($etkinlik) {
			return $etkinlik['engelli_uygun'] == $_REQUEST['engelli_uygun'];
		});
	}

	$delays = [100, 150, 200, 250, 300, 350];
	$cSelect2 = new cSelect2();
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Spor Bul - Spor Etkinlikleri</title>
		<?php include "linkler.php"; // Bootstrap, Font Awesome ve ana CSS dosyanız burada olmalı ?>
        <style>
            /* Banner Alanı Stili (Kullanıcının isteği üzerine dokunulmadı, orijinal #a0a2b3 veya benzeri varsayılıyor) */
            .inner-hero {
                padding: 70px 0;
                background-color: #a0a2b3; /* Kullanıcının orijinal hakkimizda.php'sindeki gibi */
            }
            .inner-hero .main-heading h1 {
                font-size: 2.8rem;
                font-weight: 600;
                color: #fff;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            }
            .inner-hero .page-prog a, .inner-hero .page-prog span, .inner-hero .page-prog p {
                color: #f0f0f0;
                font-size: 0.9rem;
            }
            .inner-hero .page-prog p.bold {
                color: #fff;
                font-weight: 500;
            }

            /* Filtre Alanı Stilleri */
            .filters-section {
                background-color: #f8f9fa;
                padding: 30px; /* Biraz daha fazla padding */
                border-radius: 12px;
                margin-bottom: 40px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.07); /* Hafifçe belirginleştirilmiş gölge */
            }
            .filters-section .form-label {
                font-weight: 500;
                color: #343a40; /* Daha koyu label rengi */
                margin-bottom: 10px; /* Label ve input arası boşluk artırıldı */
                display: block;
            }
            .filters-section .form-control,
            .filters-section .select2-container--default .select2-selection--single {
                border-radius: 8px;
                border: 1px solid #ced4da; /* Standart Bootstrap border rengi */
                padding: 12px 18px; /* Padding artırıldı */
                height: auto;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
                width: 100%;
                background-color: #fff; /* Input arkaplanı beyaz */
            }
            .filters-section .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 1.5; /* Dikey hizalama için */
                padding-left: 0;
            }
            .filters-section .select2-container--default .select2-selection--single .select2-selection__arrow {
                 height: calc(1.5em + 1.5rem + 2px); /* Bootstrap input yüksekliğine göre ayar */
                 right: 10px;
            }
            .filters-section .form-control:focus,
            .filters-section .select2-container--default.select2-container--open .select2-selection--single {
                border-color: #ffc107; /* Tema rengi */
                box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.3); /* Gölge rengi ayarlandı */
            }
            .filter-buttons .theme-btn5, .filter-buttons .btn-outline-secondary {
                border-radius: 25px; /* Tamamen yuvarlak (pill) butonlar */
                padding: 12px 30px;
                font-weight: 500;
                letter-spacing: 0.5px;
                transition: all 0.3s ease;
                min-width: 160px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }
            .filter-buttons .theme-btn5 {
                background-color: #ffc107;
                border-color: #ffc107;
                color: #212529;
            }
            .filter-buttons .theme-btn5:hover {
                background-color: #e0a800;
                border-color: #d39e00;
                transform: translateY(-2px) scale(1.02);
                box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            }
            .filter-buttons .btn-outline-secondary {
                border: 1px solid #6c757d;
                color: #6c757d;
                background-color: transparent;
            }
            .filter-buttons .btn-outline-secondary:hover {
                background-color: #6c757d;
                color: #fff;
                transform: translateY(-2px) scale(1.02);
                box-shadow: 0 6px 15px rgba(108, 117, 125, 0.2);
            }

            /* Etkinlik Kartı Stilleri */
            .event-card {
                background: #ffffff;
                border: 1px solid #e9ecef; /* Çok hafif bir border */
                border-radius: 16px; /* Daha yuvarlak */
                overflow: hidden;
                margin-bottom: 30px;
                height: 100%;
                display: flex;
                flex-direction: column;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07); /* Yumuşak ve yayvan gölge */
                transition: transform 0.35s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
            }
            .event-card:hover {
                transform: translateY(-10px); /* Hover'da daha belirgin kalkma */
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            }
            .event-card .thumbnail {
                height: 230px; /* Resim alanı biraz daha yüksek */
                overflow: hidden;
                position: relative;
            }
            .event-card .thumbnail img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
            }
            .event-card:hover .thumbnail img {
                transform: scale(1.08); /* Hover'da resme daha belirgin zoom */
            }
            .event-card .event-type-badge {
                position: absolute;
                top: 18px; /* Badge konumu ayarlandı */
                left: 18px;
                background-color: #ffc107; /* Tema rengi */
                color: #212529; /* Koyu metin */
                padding: 6px 12px;
                border-radius: 20px; /* Pill badge */
                font-size: 0.7rem; /* Font küçültüldü */
                font-weight: 600; /* Daha belirgin */
                letter-spacing: 0.5px;
                z-index: 1;
                box-shadow: 0 2px 5px rgba(0,0,0,0.15);
            }
            .event-card .event-content {
                padding: 25px; /* İçerik padding'i artırıldı */
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }
            .event-card .event-content h4 {
                font-size: 1.25rem; /* Başlık biraz daha büyük */
                font-weight: 700; /* Kalın başlık */
                margin-bottom: 10px;
                color: #343a40; /* Koyu gri */
                line-height: 1.3;
                transition: color 0.3s ease;
            }
            .event-card a:hover h4 {
                color: #e0a800; /* Hover'da başlık rengi değişimi */
            }
            .event-card .event-meta {
                font-size: 0.82rem; /* Meta bilgi fontu */
                color: #6c757d; /* Orta gri */
                margin-bottom: 18px; /* Meta ve açıklama arası boşluk */
                line-height: 1.7;
            }
            .event-card .event-meta i {
                margin-right: 8px;
                color: #ffc107;
                width: 18px; /* İkon alanı */
                text-align: center;
            }
            .event-card .event-meta span {
                display: flex; /* İkon ve metni hizalamak için */
                align-items: center;
                margin-bottom: 6px;
            }
            .event-card .event-description {
                font-size: 0.9rem;
                color: #495057; /* Açıklama metni rengi */
                margin-bottom: 25px;
                flex-grow: 1;
                line-height: 1.65;
            }
            .event-card .event-footer {
                margin-top: auto;
                padding-top: 20px;
                border-top: 1px solid #f1f3f5; /* Çok açık gri border */
                font-size: 0.8rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .event-card .event-footer .badge {
                font-size: 0.78rem; /* Badge fontu */
                padding: 7px 12px; /* Badge padding */
                border-radius: 20px;
                font-weight: 500;
            }
            .event-card .details-link a {
                display: inline-flex;
                align-items: center;
                padding: 8px 16px;
                background-color: #ffc107;
                color: #212529;
                border-radius: 25px;
                font-size: 0.8rem;
                font-weight: 500;
                text-decoration: none;
                transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
                box-shadow: 0 2px 8px rgba(255,193,7,0.3);
            }
            .event-card .details-link a:hover {
                background-color: #e0a800;
                text-decoration: none;
                transform: scale(1.03) translateY(-1px);
                box-shadow: 0 4px 12px rgba(224,168,0,0.4);
            }
            .event-card .details-link a i {
                margin-left: 8px;
                font-size: 0.7rem; /* İkon boyutu */
            }
        </style>
	</head>
	<body>
		<div class="paginacontainer">
			<?php // Progress wrap HTML ?>
		</div>
		<div class="sec-preloader">
			<?php // Preloader HTML ?>
		</div>

		<?php include "header2.php"; ?>

		<div class="inner-hero bg-cover">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-heading">
							<div class="page-prog">
								<a href="index.php">Anasayfa</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Spor Etkinlikleri</p>
							</div>
							<h1>Spor Etkinlikleri</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="events-page-sec mt-5 mb-5">
			<div class="container">
                <div class="filters-section">
                    <form method="get" action="spor-etkinlikleri.php">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 mb-4">
                                <label for="etkinlik_adi" class="form-label">Etkinlik Adı</label>
                                <input class="form-control" type="text" name="etkinlik_adi" id="etkinlik_adi" placeholder="Etkinlik Ara..." value="<?php echo htmlspecialchars($_REQUEST['etkinlik_adi'] ?? ''); ?>" />
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <label for="ilce_id" class="form-label">İlçe</label>
                                <select name="ilce_id" id="ilce_id" class="select2 form-control">
                                    <?php echo $cSelect2::Ilceler(34)->setSecilen($_REQUEST['ilce_id'] ?? null)->setSeciniz()->getSelect("ID", "AD"); ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <label for="tur_id" class="form-label">Etkinlik Türü</label>
                                <select name="tur_id" id="tur_id" class="select2 form-control">
                                    <?php echo $cSelect2::EtkinlikTurleri()->setSecilen($_REQUEST['tur_id'] ?? null)->setSeciniz()->getSelect("ID", "AD"); ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <label for="engelli_uygun" class="form-label">Engelli Katılımı</label>
                                <select name="engelli_uygun" id="engelli_uygun" class="select2 form-control">
                                    <?php echo $cSelect2::Durum()->setSecilen($_REQUEST['engelli_uygun'] ?? null)->setSeciniz()->getSelect("ID", "AD"); ?>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <label for="baslangic_tarihi" class="form-label">Başlangıç Tarihi</label>
                                <input type="date" name="baslangic_tarihi" id="baslangic_tarihi" class="form-control" value="<?php echo htmlspecialchars($_REQUEST['baslangic_tarihi'] ?? ''); ?>">
                            </div>
                            <div class="col-lg-3 col-md-6 mb-4">
                                <label for="bitis_tarihi" class="form-label">Bitiş Tarihi</label>
                                <input type="date" name="bitis_tarihi" id="bitis_tarihi" class="form-control" value="<?php echo htmlspecialchars($_REQUEST['bitis_tarihi'] ?? ''); ?>">
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3 mb-lg-0 d-flex align-items-end justify-content-start filter-buttons">
                                <button type="submit" class="theme-btn5 me-2">Filtrele <i class="fa-solid fa-filter fa-fw ms-1"></i></button>
                                <a href="spor-etkinlikleri.php" class="btn btn-outline-secondary">Temizle <i class="fa-solid fa-times fa-fw ms-1"></i></a>
                            </div>
                        </div>
                    </form>
                </div>

				<div class="row">
					<?php if (!empty($filtrelenmisEtkinlikler)): ?>
						<?php foreach($filtrelenmisEtkinlikler as $key => $etkinlik): ?>
							<?php $delay = $delays[$key % count($delays)]; ?>
							<div class="col-lg-3 col-md-6 col-sm-6 d-flex" data-aos="fade-up" data-aos-offset="50" data-aos-duration="500" data-aos-delay="<?php echo $delay; ?>">
							    <div class="event-card w-100">
                                    <div class="thumbnail">
                                        <span class="event-type-badge"><?php echo htmlspecialchars($etkinlik['tur_adi']); ?></span>
							            <a href="etkinlik-detay.php?id=<?php echo $etkinlik['id']; ?>" class="text-decoration-none">
                                            <img src="<?php echo htmlspecialchars($etkinlik['resim_url']); ?>" alt="<?php echo htmlspecialchars($etkinlik['adi']); ?>" />
                                        </a>
							        </div>
							        <div class="event-content">
							            <a href="etkinlik-detay.php?id=<?php echo $etkinlik['id']; ?>" class="text-decoration-none">
                                            <h4><?php echo htmlspecialchars($etkinlik['adi']); ?></h4>
                                        </a>
							            <div class="event-meta">
							                <span><i class="fa-regular fa-calendar-alt"></i> <?php echo date("d.m.Y", strtotime($etkinlik['tarih'])); ?> - <?php echo htmlspecialchars($etkinlik['saat']); ?></span>
							                <span><i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($etkinlik['ilce_adi']); ?></span>
							            </div>
							            <p class="event-description">
                                            <?php
                                                $kisa_aciklama = htmlspecialchars($etkinlik['kisa_aciklama']);
                                                if (mb_strlen($kisa_aciklama, 'UTF-8') > 80) {
                                                    $kisa_aciklama = mb_substr($kisa_aciklama, 0, 80, 'UTF-8') . '...';
                                                }
                                                echo $kisa_aciklama;
                                            ?>
                                        </p>
                                        <div class="event-footer">
                                            <span class="badge <?php echo $etkinlik['engelli_uygun'] ? 'bg-success-subtle text-success-emphasis' : 'bg-danger-subtle text-danger-emphasis'; ?>">
                                                <i class="fa-solid <?php echo $etkinlik['engelli_uygun'] ? 'fa-check-circle' : 'fa-times-circle'; ?> me-1"></i>
                                                Engelli Katılımı <?php echo $etkinlik['engelli_uygun'] ? 'Uygun' : 'Değil'; ?>
                                            </span>
                                            <span class="details-link">
                                                <a href="etkinlik-detay.php?id=<?php echo $etkinlik['id']; ?>">Detaylar <i class="fa-solid fa-arrow-right fa-xs"></i></a>
                                            </span>
                                        </div>
							        </div>
							    </div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="col-12 text-center py-5">
                            <i class="fa-regular fa-calendar-times fa-3x text-muted mb-3"></i>
							<h4 class="text-muted">Etkinlik Bulunamadı</h4>
                            <p class="text-muted">Aradığınız kriterlere uygun bir spor etkinliği bulunamadı. Lütfen filtrelerinizi değiştirerek tekrar deneyin.</p>
						</div>
					<?php endif; ?>
				</div>

				<div class="space60"></div>
				<?php if (count($tumEtkinlikler) > 8): /* Örnek: Sayfa başına 8 etkinlik */ ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Önceki</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">Sonraki</a></li>
                        </ul>
                    </nav>
                <?php endif; ?>
	            <div class="space60"></div>
			</div>
		</div>

		<?php include "footer.php"; ?>
		<?php include "scripts.php"; // jQuery ve Select2 JS burada olmalı ?>
        <script>
            $(document).ready(function() {
                if ($.fn.select2) {
                    $('.select2').select2({
                        placeholder: "Tümü",
                        allowClear: true,
                        width: '100%',
                        minimumResultsForSearch: Infinity // Arama kutusunu gizler (isteğe bağlı)
                    });
                }
            });
        </script>
	</body>
</html>