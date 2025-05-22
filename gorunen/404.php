<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Spor Bul | 404</title>
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

		<!--=====PRELOADER START=======-->

		<!-- search popup start -->
		<div class="search__popup">
			<div class="container">
				<div class="row">
					<div class="col-xxl-12">
						<div class="search__wrapper">
							<div class="search__top d-flex justify-content-between align-items-center">
								<div class="search__logo">
									<a href="index.html">
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
		<div class="login-page sp bg-cover" style="background-color: #a0a2b3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-main-heading">
							<div class="page-prog">
								<a href="index">Anasayfa</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Sayfa Bulunamadı</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5 m-auto">
						<div class="login-form">
							<div class="text-center">
								<div class="forgot-icon">
									<img src="/vexon/assets/img/shapes/404.png" alt="vexon" />
								</div>
								<h3 class="mt-5 mb-2">Hata 404</h3>
								<p class="mb-5">Aradığınız Sayfa Bulunamadı</p>
								<a href="index" class="theme-btn1">Anasayfa Git</a>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<?include "scripts.php";?>
	</body>
</html>
