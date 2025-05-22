<?
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	$result     	= $cSorgu->getSporSalonlari($_REQUEST);
    $rows       	= $result['rows'];

    $rows_talep 	= $cSorgu->getTalepler($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Spor Bul</title>
		<link rel="stylesheet" href="/custom.css" />
		<?include "linkler.php" ?>
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
		<?include "header2.php";?>
		<div class="hero1">
			<div class="container">
				<div class="hero1-bg bg-cover" style="background-image: url(/img/banner2.jpg); height: 550px; margin-bottom: 20px;">
					<div class="row align-items-center">
						<div class="col-lg-6 text-end offset-lg-6">
							<div class="main-heading1">
								<h1 class="text-anime-style-3 text-white">Sadece bir adım at, başarıya koş!</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="blog1-cetegorys sp" style="background-color: #f5f7fa; padding-top:22px;">

			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="heading1">
							<h2 class="text-anime-style-3">Kategoriler</h2>
						</div>
					</div>
					<!--
					<div class="col-lg-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="350">
						<div class="text-end md:text-start sm:text-start sm:mt-20 md:mt-20">
							<a class="theme-btn1" href="categories.html">Explore All Topic </a>
						</div>
					</div>
					-->
				</div>

				<div class="row mt-30 sm:mt-0 md:mt-0">
				    <div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="450">
				        <div class="blog1-cetegory-box mt-30 text-center">
				        	<a href="salonlar">
					            <div class="d-flex justify-content-center align-items-center text-white" style="height: 150px; border-radius: 10px; background-color: #9b3d36;">
					                <p class="m-0 fw-bold" style="font-size: 18px;">Spor Tesisleri</p>
					            </div>
					        </a>
				        </div>
				    </div>

				    <div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="350">
				        <div class="blog1-cetegory-box mt-30 text-center">
				        	<a href="salonlar">
					            <div class="d-flex justify-content-center align-items-center text-white" style="height: 150px; border-radius: 10px; background-color: #22275A;">
					                <p class="m-0 fw-bold" style="font-size: 18px;">Spor Etkinlikleri</p>
					            </div>
					        </a>
				        </div>
				    </div>

				    <div class="col-lg col-md-6" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="300">
				        <div class="blog1-cetegory-box mt-30 text-center">
				        	<a href="https://sporbul.ozgurh.tr/">
				        		<div class="d-flex justify-content-center align-items-center text-white" style="height: 150px; border-radius: 10px; background-color: #9b3d36;">
					                <p class="m-0 fw-bold" style="font-size: 18px;">Spor Arkadaşı</p>
					            </div>
				        	</a>
				        </div>
				    </div>
				</div>

			</div>
		</div>

		<div class="blog1 sp bg1 _relative">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="blog1-posts-area">
							<div class="row">
								<?foreach($rows as $key => $row){?>
									<div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="<?=$key % 2 == 0 ? '0' : '100' ?>">
										<a href="/salon?id=<?=$row->ID?>">
										<div class="blog1-single-box mt-30 d-flex flex-column w-100" style="background: #fff; border: 1px solid #eee; overflow: hidden;">
    <div class="thumbnail image-anime" style="height: 250px; overflow: hidden;">
        <?if(!is_null($row->RESIM_URL)){?>
            <img src="<?=fncImgPathSite($row->RESIM_URL)?>" alt="vexon" class="img-fluid w-100 h-100" style="size: cover;" />
        <?}else{?>
            <img src="/img/sporbul.png" alt="vexon" class="img-fluid w-100 h-100" style="size: cover;" />
        <?}?>
    </div>
    <div class="heading1">
        <h4><a href="/salon?id=<?=$row->ID?>"><?=$row->CARI?></a></h4> <div class="social-area">
            <a href="#" class="social"><?=$row->BRANSLAR?></a> </div>
        <p class="mt-16"><?=$row->ADRES?></p>
        <div class="author-area">
            <div class="author">
                <?=$row->IL?> / <?=$row->ILCE?>
            </div>
        </div>
    </div>
</div>
										</a>
									</div>	
								<?}?>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="blog1-sidebar-area ml-30 sm:ml-0 md:ml-0 md:mt-30 sm:mt-30">
							<div class="sidebar-widget_1 _search-area1">
								<h3>Ara</h3>
								<form action="salonlar" method="GET">
									<input type="text" name="salon" id="salon" placeholder="Spor Salonu Ara" />
								</form>
							</div>
							<!--
							<div class="sidebar-widget_1 _author-intro mt-40">
								<div class="sidebar-author-thumb text-center">
									<img src="/vexon/assets/img/blog/sidebar-author1.png" alt="vexon" />
									<h4>Jerry Helfer</h4>
									<div class="heading1">
										<p>Whether you’re a tech enthusiast or a business leader, these emerging trends are reshaping the future and offering endless opportunities for growth and creativity.</p>
									</div>
									<div class="footer-social1">
										<ul>
											<li>
												<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-brands fa-instagram"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-regular fa-basketball"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-brands fa-behance"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							-->
							<div class="sidebar-widget_1 _recent-posts mt-40">
								<h3>Son Talepler</h3>

								<?foreach($rows_talep as $key2 => $row_talep){?>
									<div class="blog1-recent-box <?=$key2 > 0 ? 'mt-16' : ''?>">
										<div class="">
											<div class="recent-thumb">
												<img src="<?=fncImgPathSite2($row_talep->AVATAR)?>" alt="vexon" />
											</div>
										</div>
										<div class="heading">
											<a href="#" class="date"><img src="/vexon/assets/img/icons/date1.svg" alt="vexon" /> <?=FormatTarih::tarih($row_talep->TARIH)?></a>
											<h5><a href="blog-single.html"><?=FormatYazi::kisalt2(strip_tags($row_talep->ACIKLAMA),50)?></a></h5>
										</div>
									</div>
								<?}?>
							</div>
							<!--
							<div class="sidebar-slider-widget mt-40">
								<div class="sidebar-single-slider">
									<div class="social-top">
										<a href="#" class="social">Social Media</a>
										<a href="#" class="time"><img src="/vexon/assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<div class="heading-area">
										<div class="_author-area">
											<div class="author">
												<div class="author_thumb">
													<img src="/vexon/assets/img/blog/blog1-author2.png" alt="vexon" />
												</div>
												<span class="author-name">Lorri Warf</span>
											</div>
											<span class="date"><img src="/vexon/assets/img/icons/date1.svg" alt="vexon" /> Oct 21, 2024</span>
										</div>
										<h4><a href="blog-single.html">Handling Negative Feedback: Maintaining Brand Reputation on Social Media</a></h4>
									</div>
								</div>

								<div class="sidebar-single-slider">
									<div class="social-top">
										<a href="#" class="social">Social Media</a>
										<a href="#" class="time"><img src="/vexon/assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<div class="heading-area">
										<div class="_author-area">
											<div class="author">
												<div class="author_thumb">
													<img src="/vexon/assets/img/blog/blog1-author2.png" alt="vexon" />
												</div>
												<span class="author-name">Lorri Warf</span>
											</div>
											<span class="date"><img src="/vexon/assets/img/icons/date1.svg" alt="vexon" /> Oct 21, 2024</span>
										</div>
										<h4><a href="blog-single.html">Handling Negative Feedback: Maintaining Brand Reputation on Social Media</a></h4>
									</div>
								</div>

								<div class="sidebar-single-slider">
									<div class="social-top">
										<a href="#" class="social">Social Media</a>
										<a href="#" class="time"><img src="/vexon/assets/img/icons/time1.svg" alt="vexon" /> 3 min read</a>
									</div>
									<div class="heading-area">
										<div class="_author-area">
											<div class="author">
												<div class="author_thumb">
													<img src="/vexon/assets/img/blog/blog1-author2.png" alt="vexon" />
												</div>
												<span class="author-name">Lorri Warf</span>
											</div>
											<span class="date"><img src="/vexon/assets/img/icons/date1.svg" alt="vexon" /> Oct 21, 2024</span>
										</div>
										<h4><a href="blog-single.html">Handling Negative Feedback: Maintaining Brand Reputation on Social Media</a></h4>
									</div>
								</div>
							</div>
							
							<div class="sidebar-widget_1 mt-70 _experience">
								<h3>Work Experience</h3>
								<div class="_experience-box divider">
									<p class="bold-text">Product Design</p>
									<p class="normal-text">2020 - Now</p>
								</div>

								<div class="_experience-box divider">
									<p class="bold-text">Brand Expertise</p>
									<p class="normal-text">2018 - Now</p>
								</div>

								<div class="_experience-box divider">
									<p class="bold-text">UI/UX Design</p>
									<p class="normal-text">2021 - Now</p>
								</div>

								<div class="_experience-box">
									<p class="bold-text">SEO Expert</p>
									<p class="normal-text">2019 - Now</p>
								</div>
							</div>
							-->
							<div class="sidebar-widget_1 instagram-feed mt-40">
								<h3>Instagram Gönderileri</h3>

								<div class="feed-all">
									<div class="row">
										<div class="col-4">
											<div class="feed-single">
												<div class="image">
													<img src="https://sporbul.ozgurh.tr/img/instagram/1.jpg" height="100" width="100" alt="vexon" />
													<a href="https://www.instagram.com/p/DFf-Nh4iPoC/?hl=tr" class="insta"><i class="fa-brands fa-instagram"></i></a>
												</div>
											</div>
										</div>
										<div class="col-4">
											<div class="feed-single">
												<div class="image">
													<img src="https://sporbul.ozgurh.tr/img/instagram/2.jpg" height="100" width="100" alt="vexon" />
													<a href="https://www.instagram.com/p/DFfMzYjOf-Q/?hl=tr" class="insta"><i class="fa-brands fa-instagram"></i></a>
												</div>
											</div>
										</div>
										<div class="col-4">
											<div class="feed-single">
												<div class="image">
													<img src="https://sporbul.ozgurh.tr/img/instagram/3.jpg" height="100" width="100" alt="vexon" />
													<a href="https://www.instagram.com/p/DFAej6ziJV9/?hl=tr" class="insta"><i class="fa-brands fa-instagram"></i></a>
												</div>
											</div>
										</div>
										<div class="col-4">
											<div class="feed-single mt-20">
												<div class="image">
													<img src="https://sporbul.ozgurh.tr/img/instagram/4.jpg" height="100" width="100" alt="vexon" />
													<a href="https://www.instagram.com/p/DExN-gfMqFy/?hl=tr&img_index=1" class="insta"><i class="fa-brands fa-instagram"></i></a>
												</div>
											</div>
										</div>
										<div class="col-4">
											<div class="feed-single mt-20">
												<div class="image">
													<img src="https://sporbul.ozgurh.tr/img/instagram/5.jpg" height="100" width="100" alt="vexon" />
													<a href="https://www.instagram.com/p/DEdJXfoiGa4/?hl=tr" class="insta"><i class="fa-brands fa-instagram"></i></a>
												</div>
											</div>
										</div>
										<div class="col-4">
											<div class="feed-single mt-20">
												<div class="image">
													<img src="https://sporbul.ozgurh.tr/img/instagram/6.jpg" height="100" width="100" alt="vexon" />
													<a href="https://www.instagram.com/p/DEIS6u4irBH/?hl=tr" class="insta"><i class="fa-brands fa-instagram"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<a href="https://www.instagram.com/sporbultr/?hl=tr" class="insta-btn">Instagram'da görüntüle <span><i class="fa-regular fa-arrow-right"></i></span></a>
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
