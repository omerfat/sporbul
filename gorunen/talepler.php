<?
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/config.php');

	$result     	= $cSorgu->getSporTalepleri($_REQUEST);
    $rows       	= $result['rows'];
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
		
		<div class="blog-page-sec sp">
			<div class="container">
				<form>
					<div class="row">   
			    		<div class="col-md-3 mb-4 text-center">
					        <label for="salon" class="form-label">Spor Salonu</label>
					        <input class="form-control custom-input text-center" type="text" name="salon" id="salon" placeholder="Spor Salonu Ara" />
					    </div>

					    <!-- İlçe -->
					    <div class="col-md-3 mb-4 text-center">
					        <label for="ilce_id" class="form-label">İlçe</label>
					        <select name="ilce_id" id="ilce_id" class="select2 custom-select2 form-control">
					            <?=$cSelect2->Ilceler(array('il_id' => $_REQUEST['il_id']))->setSecilen($_REQUEST['ilce_id'])->setSeciniz()->getSelect("ID", "AD")?>
					        </select>
					    </div>

					    <!-- Branş -->
					    <div class="col-md-3 mb-4 text-center">
					        <label for="brans_ids" class="form-label">Branş</label>
					        <select name="brans_ids[]" id="brans_ids" class="select2 custom-select2 form-control" multiple>
					            <?=$cSelect2->Branslar()->setSecilen($_REQUEST['brans_ids'])->setSeciniz()->getSelect("ID", "AD")?>
					        </select>
					    </div>

					    <!-- Yaş -->
					    <div class="col-md-3 mb-4 text-center">
					        <label for="yas" class="form-label">Yaş</label>
					        <select name="yas" id="yas" class="select2 custom-select2 form-control">
					            <?=$cSelect2->Yas()->setSecilen($_REQUEST['yas'])->setSeciniz()->getSelect("ID", "AD")?>
					        </select>
					    </div>
			    		<div class="col-md-2 mt-4 text-center">
			    			<button type="submit" class="theme-btn5">Filtrele</button>
			    		</div>
			    		<div class="w-100"></div>
					</div>
					<div class="blog-details1-all">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="details content-area mt-40">
										<div class="comments-area">
											<div class="heading1 mt-40">
												<h3>Spor Talepleri (<?=count2($rows)?>)</h3>
											</div>
											<div class="space30"></div>
											<?foreach ($rows as $key => $row) {?>
												<div class="comment-box">
													<div class="top-area">
														<div class="author-area">
															<div class="image">
																<img src="<?=fncImgPathSite2($row->AVATAR)?>" alt="avatar" width="80"/>
															</div>
															<div class="heading1 ml-20">
																<h4><?=$row->KAYIT_YAPAN?></h4>
																<p class="mt-2"><?=FormatTarih::tarih($row->TARIH)?></p>
															</div>
														</div>
														<a href="https://sporbul.ozgurh.tr/views/talep/talep_listesi.php?talep_no=<?=$row->ID?>" class="reply-btn"><i class="fa-solid fa-user-plus"></i> İstek At</a>
													</div>
													<div class="heading1 mt-20">
														<?=$row->ACIKLAMA?>
													</div>
												</div>
											<?}?>
										</div>
									</div>
								</div>
							</div>

						</div>
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
