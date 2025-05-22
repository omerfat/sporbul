<?
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

    $row     		= $cSorgu->getSalon($_REQUEST);
    $rows_resim     = $cSorgu->getCariResimler($_REQUEST);
    //var_dump2($row);die;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Spor Bul - Spor Salonları</title>
		<?include "linkler.php" ?>
	</head>
	<style>
	.mySwiper .swiper-slide {
	  opacity: 0.4;
	  cursor: pointer;
	  margin-right: 0 !important;
      padding: 0 !important;
	}
	.mySwiper .swiper-slide img {
	    border-radius: 6px;
	    margin: 0;
	    padding: 0;
	}
	.mySwiper .swiper-slide-thumb-active {
	  opacity: 1;
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
								<p class="bold">Spor Tesisleri</p>
							</div>
							<h1>Spor Tesisleri</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blog-details1-all sp">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-12">
		                <div class="row align-items-center">
		                    <div class="col-lg-8 m-auto">
		                        <div class="blog-page3-single-box text-center">
		                            <div class="heading1">
		                                <h2><?=$row->CARI?></h2>
		                                <p class="mt-16"><?=$row->ACIKLAMA?></p>
		                            </div>
		                        </div>
		                    </div>

		                    <div class="col-lg-8 m-auto">
								<div class="swiper mySwiper2 mb-3">
								    <div class="swiper-wrapper">
								        <?foreach($rows_resim as $key => $row_resim){?>
								        <div class="swiper-slide">
								            <img src="<?=fncImgPathSite($row_resim->RESIM_URL)?>" class="d-block w-100 rounded" alt="<?=$row_resim->RESIM_ADI_ILK?>" height="500">
								        </div>
								        <? } ?>
								    </div>
								</div>
								<div class="swiper mySwiper">
								    <div class="swiper-wrapper">
								        <?foreach($rows_resim as $key => $row_resim){?>
								        <div class="swiper-slide">
								            <img src="<?= fncImgPathSite($row_resim->RESIM_URL) ?>" class="img-fluid rounded" alt="<?=$row_resim->RESIM_ADI_ILK?>" width="150">
								        </div>
								        <?}?>
								    </div>
								</div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<?include "footer.php";?>
		<?include "scripts.php";?>
	</body>
</html>
<script type="text/javascript">

	var swiperThumbs = new Swiper(".mySwiper", {
	    spaceBetween: 4,
	    slidesPerView: 4,
	    freeMode: true,
	    watchSlidesProgress: true,
	});

	var swiperMain = new Swiper(".mySwiper2", {
	    spaceBetween: 10,
	    navigation: {
	        nextEl: ".swiper-button-next",
	        prevEl: ".swiper-button-prev",
	    },
	    thumbs: {
	        swiper: swiperThumbs,
	    },
	});

</script>
