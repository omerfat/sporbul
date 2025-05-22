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
								<p class="bold">Spor Tesisleri</p>
							</div>
							<h1>Spor Tesisleri</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blog-page-sec mt-5">
			<div class="container">
				<form>
					<div class="row">   
			    		<!-- Spor Salonu -->
					    <div class="col-md-3 mb-4 text-center">
					        <label for="salon" class="form-label">Spor Salonu</label>
					        <input class="form-control custom-input text-center" type="text" name="salon" id="salon" placeholder="Spor Salonu Ara" />
					    </div>

					    <!-- İlçe -->
					    <div class="col-md-3 mb-4 text-center">
					        <label for="ilce_id" class="form-label">İlçe</label>
					        <select name="ilce_id" id="ilce_id" class="select2 custom-select2 form-control">
					            <?=$cSelect2->Ilceler(34)->setSecilen($_REQUEST['ilce_id'])->setSeciniz()->getSelect("ID", "AD")?>
					        </select>
					    </div>

					    <!-- Branş -->
					    <div class="col-md-3 mb-4 text-center">
					        <label for="brans_ids" class="form-label">Branş</label>
					        <select name="brans_ids[]" id="brans_ids" class="select2 custom-select2 form-control" multiple>
					            <?=$cSelect2->Branslar()->setSecilen($_REQUEST['brans_ids'])->setSeciniz()->getSelect("ID", "AD")?>
					        </select>
					    </div>

					    <!-- Engelli Durumu -->
					    <div class="col-md-3 mb-4 text-center">
					        <label for="engelli" class="form-label">Engelli Bireylere</label>
					        <select name="engelli" id="engelli" class="select2 custom-select2 form-control">
					            <?=$cSelect2->Durum()->setSecilen($_REQUEST['engelli'])->setSeciniz()->getSelect("ID", "AD")?>
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
							    <a href="/salon?id=<?=$row->ID?>">
							     <div class="blog1-single-box mt-30 d-flex flex-column w-100" style="background: #fff; border: 1px solid #eee; border-radius: 10px; overflow: hidden;">
    <div class="thumbnail image-anime" style="height: 250px; overflow: hidden;">
        <?if(!is_null($row->RESIM_URL)){?>
            <img src="<?=fncImgPathSite($row->RESIM_URL)?>" alt="vexon" class="img-fluid w-100 h-100" style="size: cover; border-radius: 1.5rem;" />
        <?}else{?>
            <img src="/img/sporbul.png" alt="vexon" class="img-fluid w-100 h-100" style="size: cover;" />
        <?}?>
    </div>
    <div class="heading1 d-flex flex-column justify-content-between flex-grow-1 p-3">
        <div>
            <h4><?=$row->CARI?></a></h4> <div class="social-area mb-2">
                <a href="#" class="social"><?=$row->BRANSLAR?></a> </div>
            <p class="mt-2"><?=$row->ADRES?></p>
        </div>
        <div class="author-area mt-auto pt-3">
            <div class="author text-muted">
                <?=$row->IL?> / <?=$row->ILCE?>
            </div>
        </div>
    </div>
</div>>
							    </a>
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
