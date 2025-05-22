<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');
	// Örnek cSelect2 ve diğer yardımcı fonksiyonlar (Sitenizde tanımlı olmalı)
	// ... (Bir önceki koddaki cSelect2 ve örnek veri tanımlamaları buraya da eklenebilir)

    // Örnek Etkinlik Verisi (Normalde bu ID'ye göre veritabanından çekilir)
    $etkinlik_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $secilenEtkinlik = null;

    // Tüm etkinlikler dizisini burada tekrar tanımlayalım (veya global bir yerden çekelim)
	$tumEtkinlikler = [
		['id' => 1, 'adi' => 'Bahar Maratonu', 'tur_id' => 1, 'tur_adi' => 'Koşu', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-05-20', 'saat' => '09:00', 'uzun_aciklama' => 'Şehrin en güzel parkurunda baharı koşarak karşılıyoruz. Her seviyeden katılımcıya açık olan bu etkinlikte, 5K, 10K ve yarı maraton kategorileri bulunmaktadır. Etkinlik sonunda tüm katılımcılara madalya ve çeşitli ikramlar sunulacaktır. Lütfen kayıt için web sitemizi ziyaret edin.', 'resim_url' => 'https://picsum.photos/seed/event1/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Sahil Yolu Koşu Parkuru, Merkez', 'katilim_kosullari' => '18 yaşından büyük olmak. Kayıt formunu doldurmuş olmak.', 'iletisim' => 'info@baharmaratonu.com / 0555 123 4567'],
		['id' => 2, 'adi' => 'Dağ Bisikleti Yarışı', 'tur_id' => 2, 'tur_adi' => 'Bisiklet', 'ilce_id' => 2, 'ilce_adi' => 'Diğer İlçe A', 'tarih' => '2025-06-10', 'saat' => '10:00', 'uzun_aciklama' => 'Adrenalin dolu bir dağ bisikleti deneyimi için bize katılın. Zorlu parkurlar, teknik inişler ve muhteşem manzaralar sizi bekliyor. Profesyonel ve amatör kategoriler mevcuttur. Kask ve koruyucu ekipman zorunludur.', 'resim_url' => 'https://picsum.photos/seed/event2/1200/600', 'engelli_uygun' => 0, 'adres_detay' => 'Orman Parkuru, Giriş Kapısı Yanı, Diğer İlçe A', 'katilim_kosullari' => 'Kendi bisikletinizi getirmeniz gerekmektedir. 16 yaşından büyükler katılabilir.', 'iletisim' => 'dagbisikleti@example.com'],
		// ... Diğer etkinlikler için de benzer detaylı veriler olmalı
        // Bu örnekte sadece ilk iki etkinlik için uzun açıklama eklendi
        // Geri kalan 10 etkinlik için de benzer şekilde 'uzun_aciklama', 'katilim_kosullari', 'iletisim' eklenebilir.
        // Şimdilik kısa_aciklama'yı uzun_aciklama olarak kullanalım diğerleri için:
        ['id' => 3, 'adi' => 'Güneşin Doğuşu Yoga Kampı', 'tur_id' => 3, 'tur_adi' => 'Yoga', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-07-01', 'saat' => '05:30', 'uzun_aciklama' => 'Doğayla iç içe, huzurlu bir yoga deneyimi. Güne yenilenmiş başlayın. Profesyonel eğitmenler eşliğinde 2 gün sürecek bu kampta, farklı yoga seansları ve meditasyon atölyeleri yer alacaktır. Konaklama ve yemekler ücrete dahildir.', 'resim_url' => 'https://picsum.photos/seed/event3/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Plaj Alanı, Yoga Çadırı', 'katilim_kosullari' => 'Yoga matınızı getiriniz. Sınırlı kontenjan.', 'iletisim' => 'yogakampi@example.com'],
        // Diğer 9 etkinlik için de benzer şekilde doldurulabilir.
        // ... (Kalan etkinliklerin $tumEtkinlikler dizisindeki tanımları)
        ['id' => 4, 'adi' => 'Yaz Futbol Turnuvası', 'tur_id' => 4, 'tur_adi' => 'Futbol', 'ilce_id' => 3, 'ilce_adi' => 'Diğer İlçe B', 'tarih' => '2025-06-15', 'saat' => '14:00', 'uzun_aciklama' => 'Mahalleler arası dostluk futbol turnuvası. Takımını kur, sahaya çık! Turnuva boyunca sürpriz ödüller ve etkinlikler olacaktır.', 'resim_url' => 'https://picsum.photos/seed/event4/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Şehir Stadyumu', 'katilim_kosullari' => 'Takım başına 10 oyuncu. Kayıt ücreti bulunmaktadır.', 'iletisim' => 'futbol@example.com'],
		['id' => 5, 'adi' => 'Çocuklar İçin Spor Şenliği', 'tur_id' => 5, 'tur_adi' => 'Çocuk Etkinliği', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-05-25', 'saat' => '11:00', 'uzun_aciklama' => 'Çocuklara özel eğlenceli yarışmalar, oyunlar ve spor aktiviteleri. Palyaço gösterileri ve ikramlar.', 'resim_url' => 'https://picsum.photos/seed/event5/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Merkez Park', 'katilim_kosullari' => '3-12 yaş arası çocuklar. Ücretsizdir.', 'iletisim' => 'cocuksenligi@example.com'],
		['id' => 6, 'adi' => 'Kıyı Şeridi Bisiklet Gezisi', 'tur_id' => 2, 'tur_adi' => 'Bisiklet', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-08-05', 'saat' => '09:30', 'uzun_aciklama' => 'Deniz manzarası eşliğinde keyifli ve herkese açık bir bisiklet turu. Yaklaşık 20 km\'lik parkur.', 'resim_url' => 'https://picsum.photos/seed/event6/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Sahil Bisiklet Yolu Başlangıç Noktası', 'katilim_kosullari' => 'Kask takmak zorunludur.', 'iletisim' => 'bisikletgezi@example.com'],
		['id' => 7, 'adi' => 'Doğa Yürüyüşü & Meditasyon', 'tur_id' => 6, 'tur_adi' => 'Yürüyüş', 'ilce_id' => 2, 'ilce_adi' => 'Diğer İlçe A', 'tarih' => '2025-09-12', 'saat' => '08:00', 'uzun_aciklama' => 'Ormanın derinliklerinde rehber eşliğinde huzurlu bir yürüyüş ve meditasyon seansı. Kuş sesleri eşliğinde stresten arının.', 'resim_url' => 'https://picsum.photos/seed/event7/1200/600', 'engelli_uygun' => 0, 'adres_detay' => 'Yeşil Vadi Parkuru Girişi', 'katilim_kosullari' => 'Uygun yürüyüş ayakkabısı ve su matarası önerilir.', 'iletisim' => 'dogayuruyusu@example.com'],
		['id' => 8, 'adi' => 'Veteranlar Basketbol Maçı', 'tur_id' => 7, 'tur_adi' => 'Basketbol', 'ilce_id' => 3, 'ilce_adi' => 'Diğer İlçe B', 'tarih' => '2025-07-20', 'saat' => '18:00', 'uzun_aciklama' => 'Eski dostların ve efsane oyuncuların buluştuğu heyecanlı bir gösteri maçı. Maç sonrası söyleşi.', 'resim_url' => 'https://picsum.photos/seed/event8/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Kapalı Spor Salonu, Ana Giriş', 'katilim_kosullari' => 'İzleyici girişi ücretsizdir.', 'iletisim' => 'basketvet@example.com'],
		['id' => 9, 'adi' => 'Açık Hava Fitness Festivali', 'tur_id' => 8, 'tur_adi' => 'Fitness', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-06-01', 'saat' => '10:00', 'uzun_aciklama' => 'Tüm gün sürecek ücretsiz fitness dersleri (Zumba, Pilates, CrossFit), workshoplar ve sağlıklı yaşam standları. DJ performansları.', 'resim_url' => 'https://picsum.photos/seed/event9/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Şehir Meydanı, Ana Sahne', 'katilim_kosullari' => 'Spor kıyafetlerinizle gelin. Ücretsizdir.', 'iletisim' => 'fitnessfest@example.com'],
		['id' => 10, 'adi' => 'Plaj Voleybolu Turnuvası', 'tur_id' => 9, 'tur_adi' => 'Voleybol', 'ilce_id' => 1, 'ilce_adi' => 'Merkez İlçe', 'tarih' => '2025-08-15', 'saat' => '13:00', 'uzun_aciklama' => 'Güneş, kum ve voleybol! Yazın en eğlenceli turnuvasına davetlisiniz. 2 kişilik takımlar halinde kayıt alınacaktır.', 'resim_url' => 'https://picsum.photos/seed/event10/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Halk Plajı, Voleybol Sahaları', 'katilim_kosullari' => 'Takım kaydı gereklidir.', 'iletisim' => 'plajvoleybol@example.com'],
		['id' => 11, 'adi' => 'Engelsiz Yaşam Koşusu', 'tur_id' => 1, 'tur_adi' => 'Koşu', 'ilce_id' => 2, 'ilce_adi' => 'Diğer İlçe A', 'tarih' => '2025-10-03', 'saat' => '10:00', 'uzun_aciklama' => 'Farkındalık yaratmak ve engelsiz yaşamı desteklemek için düzenlenen anlamlı bir koşu. Tüm gelirler engelli bireyler yararına bağışlanacaktır.', 'resim_url' => 'https://picsum.photos/seed/event11/1200/600', 'engelli_uygun' => 1, 'adres_detay' => 'Engelsiz Yaşam Parkı Koşu Alanı', 'katilim_kosullari' => 'Bağış karşılığı kayıt. Her yaşa uygun parkur.', 'iletisim' => 'engelsizkosu@example.com'],
		['id' => 12, 'adi' => 'Doğa Macerası Kampı', 'tur_id' => 10, 'tur_adi' => 'Kamp', 'ilce_id' => 3, 'ilce_adi' => 'Diğer İlçe B', 'tarih' => '2025-09-25', 'saat' => '15:00', 'uzun_aciklama' => '2 gün sürecek, temel kampçılık eğitimleri, gece yürüyüşü ve doğa aktiviteleri içeren macera dolu bir kamp. Kendi çadırınızı getirin veya kiralayın.', 'resim_url' => 'https://picsum.photos/seed/event12/1200/600', 'engelli_uygun' => 0, 'adres_detay' => 'Göl Kenarı Kamp Alanı, Resepsiyon', 'katilim_kosullari' => 'Temel kamp malzemeleri gereklidir. Sınırlı kontenjan.', 'iletisim' => 'dogakamp@example.com'],
	];

    foreach ($tumEtkinlikler as $etkinlik) {
        if ($etkinlik['id'] == $etkinlik_id) {
            $secilenEtkinlik = $etkinlik;
            break;
        }
    }

    if (!$secilenEtkinlik) {
        // Etkinlik bulunamazsa ana sayfaya veya hata sayfasına yönlendir
        // header("Location: spor-etkinlikleri.php");
        // exit;
        // Şimdilik basit bir mesaj gösterelim:
        die("Etkinlik bulunamadı!");
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($secilenEtkinlik['adi']); ?> - Spor Bul</title>
    <?php include "linkler.php"; // Bootstrap, Font Awesome ve ana CSS ?>
    <style>
        /* Banner Alanı Stili (Kullanıcının isteği üzerine dokunulmadı) */
        .inner-hero {
            padding: 60px 0; /* Biraz daha az padding */
            background-color: #a0a2b3;
        }
        .inner-hero .main-heading h1 {
            font-size: 2.5rem; /* Başlık boyutu ayarlandı */
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

        /* Etkinlik Detay Sayfası Stilleri */
        .event-detail-page {
            padding-top: 40px;
            padding-bottom: 60px;
        }
        .event-detail-header img {
            width: 100%;
            max-height: 500px; /* Resim yüksekliği sınırı */
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .event-detail-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 15px;
        }
        .event-detail-meta {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 25px;
        }
        .event-detail-meta i {
            color: #ffc107; /* Tema rengi */
            margin-right: 8px;
            width: 20px;
            text-align: center;
        }
        .event-detail-meta span {
            margin-right: 20px;
            display: inline-flex;
            align-items: center;
        }
        .event-detail-content h5 { /* Alt başlıklar */
            font-size: 1.3rem;
            font-weight: 600;
            color: #343a40;
            margin-top: 30px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ffc107;
            display: inline-block;
        }
        .event-detail-content p {
            font-size: 1rem;
            line-height: 1.7;
            color: #495057;
            margin-bottom: 15px;
        }
        .event-detail-content ul {
            list-style: none;
            padding-left: 0;
        }
        .event-detail-content ul li {
            padding-left: 25px;
            position: relative;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        .event-detail-content ul li::before {
            content: "\f00c"; /* Font Awesome check icon */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            color: #28a745; /* Yeşil */
            position: absolute;
            left: 0;
            top: 3px;
        }
        .share-buttons-container {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }
        .share-buttons-container .btn-share-main {
            background-color: #ffc107;
            color: #212529;
            border: none;
            padding: 10px 20px;
            font-weight: 500;
            border-radius: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .share-buttons-container .btn-share-main:hover{
            background-color: #e0a800;
        }
        .share-options {
            /* JavaScript ile gösterilip gizlenecek */
            display: none;
            margin-top: 15px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .share-options a, .share-options button {
            display: flex; /* Block yerine flex daha iyi hizalama sağlar */
            align-items: center;
            padding: 8px 12px;
            margin-bottom: 8px;
            border-radius: 6px;
            color: #495057;
            text-decoration: none;
            transition: background-color 0.2s ease;
            border: 1px solid transparent; /* Kopyala butonu için */
            background: none; /* Kopyala butonu için */
            width: 100%; /* Tam genişlik */
            text-align: left; /* Metni sola hizala */
        }
        .share-options a:hover, .share-options button:hover {
            background-color: #e9ecef;
            color: #212529;
        }
        .share-options i {
            margin-right: 10px;
            width: 20px; /* İkon genişliği */
            text-align: center;
        }
        .share-options .btn-copy-link {
            cursor: pointer;
        }
        /* Sosyal medya renkleri */
        .share-options .fa-facebook-f { color: #1877F2; }
        .share-options .fa-twitter { color: #1DA1F2; }
        .share-options .fa-whatsapp { color: #25D366; }
        .share-options .fa-linkedin-in { color: #0A66C2; }
        .share-options .fa-envelope { color: #7f8c8d; }

        .badge-engelli {
            font-size: 0.9rem;
            padding: 0.5em 0.75em;
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
                            <a href="spor-etkinlikleri.php">Spor Etkinlikleri</a>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <p class="bold"><?php echo htmlspecialchars($secilenEtkinlik['adi']); ?></p>
                        </div>
                        <h1><?php echo htmlspecialchars($secilenEtkinlik['adi']); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="event-detail-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="event-detail-header">
                        <img src="<?php echo htmlspecialchars($secilenEtkinlik['resim_url']); ?>" alt="<?php echo htmlspecialchars($secilenEtkinlik['adi']); ?>">
                    </div>
                    <div class="event-detail-meta mb-4">
                        <span><i class="fa-regular fa-calendar-alt"></i> <?php echo date("d F Y, l", strtotime($secilenEtkinlik['tarih'])); ?></span>
                        <span><i class="fa-regular fa-clock"></i> <?php echo htmlspecialchars($secilenEtkinlik['saat']); ?></span>
                        <span><i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($secilenEtkinlik['ilce_adi']); ?></span>
                        <span><i class="fa-solid fa-tag"></i> <?php echo htmlspecialchars($secilenEtkinlik['tur_adi']); ?></span>
                    </div>

                    <div class="event-detail-content">
                        <h5>Etkinlik Açıklaması</h5>
                        <p><?php echo nl2br(htmlspecialchars($secilenEtkinlik['uzun_aciklama'])); ?></p>

                        <?php if (!empty($secilenEtkinlik['katilim_kosullari'])): ?>
                        <h5>Katılım Koşulları</h5>
                        <p><?php echo nl2br(htmlspecialchars($secilenEtkinlik['katilim_kosullari'])); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($secilenEtkinlik['adres_detay'])): ?>
                        <h5>Etkinlik Alanı</h5>
                        <p><i class="fa-solid fa-map-marker-alt text-danger me-2"></i><?php echo htmlspecialchars($secilenEtkinlik['adres_detay']); ?></p>
                        <?php endif; ?>

                         <?php if (!empty($secilenEtkinlik['iletisim'])): ?>
                        <h5>İletişim</h5>
                        <p><i class="fa-solid fa-phone text-primary me-2"></i><?php echo htmlspecialchars($secilenEtkinlik['iletisim']); ?></p>
                        <?php endif; ?>

                        <h5>Engelli Katılım Durumu</h5>
                        <p>
                            <span class="badge <?php echo $secilenEtkinlik['engelli_uygun'] ? 'bg-success-subtle text-success-emphasis' : 'bg-danger-subtle text-danger-emphasis'; ?> badge-engelli">
                                <i class="fa-solid <?php echo $secilenEtkinlik['engelli_uygun'] ? 'fa-check-circle' : 'fa-times-circle'; ?> me-1"></i>
                                Bu etkinlik engelli bireylerin katılımına <?php echo $secilenEtkinlik['engelli_uygun'] ? '<strong>uygundur</strong>' : '<strong>uygun değildir</strong>'; ?>.
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget p-4 border rounded bg-light sticky-top" style="top: 20px;">
                        <h5>Bu Etkinliği Paylaş</h5>
                        <hr>
                        <button class="btn btn-share-main w-100" id="btnShareToggle">
                            <i class="fa-solid fa-share-alt me-2"></i>Paylaşım Seçenekleri
                        </button>
                        <div class="share-options" id="shareOptionsDiv">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ); ?>" target="_blank">
                                <i class="fab fa-facebook-f"></i> Facebook'ta Paylaş
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ); ?>&text=<?php echo urlencode($secilenEtkinlik['adi']); ?>" target="_blank">
                                <i class="fab fa-twitter"></i> Twitter'da Paylaş
                            </a>
                            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($secilenEtkinlik['adi'] . " - " . "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>" target="_blank" data-action="share/whatsapp/share">
                                <i class="fab fa-whatsapp"></i> WhatsApp'ta Paylaş
                            </a>
                             <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ); ?>&title=<?php echo urlencode($secilenEtkinlik['adi']); ?>" target="_blank">
                                <i class="fab fa-linkedin-in"></i> LinkedIn'de Paylaş
                            </a>
                            <a href="mailto:?subject=İlginizi Çekebilir: <?php echo urlencode($secilenEtkinlik['adi']); ?>&body=Şu etkinliğe göz atın: <?php echo urlencode( "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ); ?>">
                                <i class="fas fa-envelope"></i> E-posta ile Gönder
                            </a>
                            <hr class="my-2">
                            <button class="btn-copy-link" id="btnCopyLink">
                                <i class="fas fa-link"></i> Bağlantıyı Kopyala
                            </button>
                            <small id="copyFeedback" class="d-block mt-1 text-success" style="display:none !important;">Bağlantı kopyalandı!</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
    <?php include "scripts.php"; // jQuery ve Bootstrap JS burada olmalı ?>
    <script>
        $(document).ready(function() {
            // Paylaşım seçeneklerini göster/gizle
            $('#btnShareToggle').on('click', function() {
                $('#shareOptionsDiv').slideToggle();
            });

            // Linki panoya kopyala
            $('#btnCopyLink').on('click', function() {
                var etkinlikURL = window.location.href;
                navigator.clipboard.writeText(etkinlikURL).then(function() {
                    $('#copyFeedback').fadeIn().delay(2000).fadeOut(); // Geri bildirimi göster ve gizle
                }, function(err) {
                    console.error('Link kopyalanamadı: ', err);
                    alert('Bağlantı kopyalanamadı. Lütfen manuel olarak kopyalayın.');
                });
            });
        });
    </script>
</body>
</html>