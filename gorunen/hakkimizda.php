<?
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	$result     = $cSorgu->getSporSalonlari($_REQUEST);
    $rows       = $result['rows'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Spor Bul</title>
		<?include "linkler.php" ?>
	</head>
	<style type="text/css">
		.full-box-link {
		    display: block;
		    text-decoration: none;
		    color: inherit; /* Metin renginin değişmemesi için */
		}

		.contact-page-box {
		    padding: 20px;
		    background: #fff;
		    border-radius: 10px;
		    text-align: center;
		    transition: 0.3s ease;
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
		<?include "header.php";?>
		<!-- <div class="inner-hero bg-cover" style="background-image: url(vexon/assets/img/bg/inner-hero-bg.jpg)"> -->
			<div class="inner-hero bg-cover" style="background-color: #a0a2b3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-heading">
							<div class="page-prog">
								<a href="index">Anasayfa</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Hakkımızda</p>
							</div>
							<h1>Hakkımızda</h1>
						</div>
					</div>
				</div>
			</div>
		</div>

		
		<div class="contact-page-sec sp">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 m-auto">
						<div class="heading1 text-center">
							<h2>BİZ KİMİZ?</h2>
							<p class="mt-16">Sporbul geleceği güzelleştirmek adına bağımsızca çalışarak spor faaliyetlerini yaygın hale getirmekle birlikte ideal spor ve sporcu bilincini oluşturabilmek için her türlü nitelikli ürün, bilgi ve hizmet üreten bir spor merkezi olmayı hedeflemektedir.</p>
						</div>
						<div class="heading1 text-center mt-5">
							<h2>VİZYONUMUZ</h2>
							<p class="mt-16">Spora, ilkelerimize ve değerlerimize bağlı kalarak, ihtiyacı olan insanlara spor alanlarında rehber olan ve yol gösteren gönüllülük hareketi olmaktır.</p>
						</div>
						<div class="heading1 text-center mt-5">
							<h2>MİSYONUMUZ</h2>
							<p class="mt-16">Geleceği güzelleştirmek adına bağımsızca çalışarak spor faaliyetlerini yaygın hale getirmekle birlikte ideal spor ve sporcu bilincini oluşturabilmek için her türlü nitelikli ürün, bilgi ve hizmet üreten bir spor merkezi olmak..</p>
						</div>


						<div class="row pt-20">
						    <div class="col-lg-6 col-md-6">
						        <a href="mailto:sporbul@gmail.com" class="full-box-link">
						            <div class="contact-page-box">
						                <div class="icon">
						                    <img src="vexon/assets/img/icons/contact-page-box1.svg" alt="vexon" />
						                </div>
						                <div class="heading">
						                    <h4>Mail Gönder</h4>
						                    <span>sporbul@gmail.com</span>
						                </div>
						            </div>
						        </a>
						    </div>
						    <div class="col-lg-6 col-md-6">
						        <a href="https://wa.me/905452183431" class="full-box-link" target="_blank">
						            <div class="contact-page-box">
						                <div class="icon">
						                    <img src="vexon/assets/img/icons/contact-page-box3.svg" alt="vexon" />
						                </div>
						                <div class="heading">
						                    <h4>Telefon</h4>
						                    <span>0545 218 3431</span>
						                </div>
						            </div>
						        </a>
						    </div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!--===== CONTACT AREA END=======-->

		<!--===== CTA AREA START=======-->
		
	
		<?include "footer.php";?>
		<?include "scripts.php";?>
	</body>
</html>
