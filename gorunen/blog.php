<?
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	$result     	= $cSorgu->getSporSalonlari($_REQUEST);
    $rows       	= $result['rows'];

    $rows_brans     = $cSorgu->getBranslar($_REQUEST);

    $delays = [100, 300, 400, 500, 250, 300, 350, 400, 450];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Shared on THEMELOCK.COM - Vexon || Blog 02</title>

		<?php include "linkler.php" ?>
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
		<div class="search__popup">
			<div class="container">
				<div class="row">
					<div class="col-xxl-12">
						<div class="search__wrapper">
							<div class="search__top d-flex justify-content-between align-items-center">
								<div class="search__logo">
									<a href="index.php">
										<img src="/vexon/assets/img/logo/white-logo.png" alt="vexon" />
									</a>
								</div>
								<div class="search__close">
									<button type="button" class="search__close-btn search-close-btn">
										<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</button>
								</div>
							</div>
							<div class="search__form">
								<form action="#">
									<div class="search__input">
										<input class="search-input-field" type="text" placeholder="Type here to search..." />
										<span class="search-focus-border"></span>
										<button type="submit">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?include "header.php"; ?>
		<div class="inner-hero bg-cover" style="background-image: url(/vexon/assets/img/bg/inner-hero-bg.jpg)">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-heading">
							<div class="page-prog">
								<a href="index.html">Anasayfa</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Spor Salonları</p>
							</div>
							<h1>Spor Salonları</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blog-page-sec sp">
			<div class="container">
				<div class="row">
					<?foreach($rows as $key => $row){
						$delay = $delays[$key % count($delays)];
						?>
					    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="<?=$delay?>" data-branslar="<?=$row->BRANSLAR?>">
						    <div class="blog1-single-box mt-30 d-flex flex-column">
						        <div class="thumbnail image-anime">
						            <img src="<?=fncImgPathSite($row->RESIM_URL)?>" alt="vexon" class="img-fluid" />
						        </div>
						        <div class="heading1">
						            <div class="social-area">
						                <a href="#" class="social"><?=$row->BRANSLAR?></a>
						            </div>
						            <h4><a href="blog-single.html"><?=$row->CARI?></a></h4>
						            <p class="mt-16"><?=$row->ADRES?></p>
						            <div class="author-area">
						                <div class="author">
						                    <?=$row->IL?> / <?=$row->ILCE?>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>  
					<?}?>
				</div>
				<div class="space60"></div>
				<div class="row" data-aos-offset="50" data-aos="fade-up" data-aos-duration="400">
					<div class="col-12 m-auto">
						<div class="theme-pagination text-center">
							<ul>
								<li>
									<a href="#"><i class="fa-solid fa-angle-left"></i></a>
								</li>
								<li><a class="active" href="#">01</a></li>
								<li><a href="#">02</a></li>
								<li>...</li>
								<li><a href="#">12</a></li>
								<li>
									<a href="#"><i class="fa-solid fa-angle-right"></i></a>
								</li>
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
