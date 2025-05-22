<?
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	$result     	= $cSorgu->getSporRotalari($_REQUEST);
    $rows       	= $result['rows'];

    $delays = [100, 300, 400, 500, 250, 300, 350, 400, 450];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Spor Bul - Spor Salonları</title>
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
		<?include "header.php"; ?>
		<div class="inner-hero bg-cover" style="background-color: #a0a2b3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-heading">
							<div class="page-prog">
								<a href="index.html">Anasayfa</a>
								<span><i class="fa-solid fa-angle-right"></i></span>
								<p class="bold">Spor Rotaları</p>
							</div>
							<h1>Spor Rotaları</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blog-page-sec mt-5">
			<div class="container">
				<form>
					<div class="row">
						<div class="col-md-3 mb-4 text-center"></div>
			    		<div class="col-md-3 mb-4 text-center">
			    			<label>İl</label>
	                        <select name="il_id" id="il_id" class="select2 form-select" data-style="btn-default">
	                            <?=$cSelect2->Iller()->setSecilen($_REQUEST['il_id'])->setSeciniz()->getSelect("ID", "AD")?>
	                        </select>
			    		</div>
			    		<div class="col-md-3 mb-4 text-center">
			    			<label>İlçe</label>
	                        <select name="ilce_id" id="ilce_id" class="select2 form-select" data-style="btn-default">
	                            <?=$cSelect2->Ilceler(array('il_id' => $_REQUEST['il_id']))->setSecilen($_REQUEST['ilce_id'])->setSeciniz()->getSelect("ID", "AD")?>
	                        </select>
			    		</div>
			    		<div class="col-md-12 mb-4 text-center">
			    			<button type="submit" class="theme-btn5">Filtrele</button>
			    		</div>
			    		<div class="w-100"></div>
						<?foreach($rows as $key => $row){
							$delay = $delays[$key % count($delays)];
							?>
						    <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-offset="50" data-aos-duration="400" data-aos-delay="<?=$delay?>" data-branslar="<?=$row->BRANSLAR?>">
							<div class="blog1-single-box mt-30 d-flex flex-column">
    <div class="thumbnail image-anime">
        <img src="<?=fncImgPathSite($row->RESIM_URL)?>" alt="vexon" class="img-fluid" />
    </div>
    <div class="heading1">
        <h4><a href="blog-single.html"><?=$row->AD?></a></h4> <div class="social-area">
            <a href="#" class="social"><?=FormatSayi::sayi($row->KM,2)?> KM</a> </div>
        <p class="mt-16"><?=$row->ACIKLAMA?></p>
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
					<div class="pagination d-flex justify-content-center">
	                    <?=$result['sayfalama']->sayfalamaOlustur();?>
	                </div>
	                <div class="space60"></div>
				</form>

				<!--
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
				 -->
			</div>
		</div>
		<?include "footer.php";?>
		<?include "scripts.php";?>
	</body>
</html>
