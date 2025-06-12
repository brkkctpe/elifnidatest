<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($urunOku["urun_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($urunOku["urun_adi"])?></a>
		</div>
	</div>
</section>		

<section id="paketpage">
	<div class="container">
		<div class="row justify-content-center mb-4">
			<div class="col-md-8">
				<img src="<?=rg($urunOku["urun_resim"])?>" class="anaresim">
				<div class="aciklama">
					<?=ss($urunOku["urun_aciklama"])?>
				</div>
				
				
				<div class="accordion" id="accordionExample">
					<?php foreach($sssDizi as $key=>$deger){ ?>
					  <div class="accordion-item">
						<h5 class="accordion-header" id="heading<?=$key?>">
						  <button class="accordion-button <?=$key<1 ? "" : "collapsed" ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$key?>" aria-expanded="true" aria-controls="collapse<?=$key?>">
							<?=ss($deger["sss_adi"])?>
						  </button>
						</h5>
						<div id="collapse<?=$key?>" class="accordion-collapse collapse  <?=$key<1 ? "show" : "" ?> " aria-labelledby="heading<?=$key?>" data-bs-parent="#accordionExample">
						  <div class="accordion-body">
							<?=ss($deger["sss_aciklama"])?>
						  </div>
						</div>
					  </div>
					<?php } ?>
				</div>
				<?php if($urunOku["urun_satis"]>0){ ?>
				<div class="kayitbanner">
					<img src="<?=trg("danismanlikback.jpg")?>" class="resim">
					<div class="bilgi">
						<div class="yazi1"><?=ss($urunOku["urun_adi"])?></div>
						<div>
							 <a href="<?=url.ld("takvim")."/".$urunOku["urun_permalink"]?>" class="btn btn-ana"><?=pd("Seç ve Devam et")?> <i class="las la-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<?php if($urunOku["urun_satis"]>0){ ?>
				<div class="fiyat mb-4 mt-4 mt-md-0"><?=ss($urunOku["urun_fiyat"])?>
				<a href="<?=url.ld("takvim")."/".$urunOku["urun_permalink"]?>" class="btn btn-outline-light py-2 px-2 ms-auto"><?=pd("Seç")?> <i class="las la-arrow-right"></i></a>
				</div>
				<?php } ?>
				<div class="sagblog mt-0">
					<?php foreach($urunDizi as $deger){ ?>
					<a href="<?=url.$deger["urun_permalink"]?>" class="blogk">
						<img src="<?=rg($deger["urun_resim"])?>" class="resim">
						<div class="adi">
							<?=ss($deger["urun_adi"])?>
						</div>
					</a>
					<?php } ?>
				</div>
				
				<div class="kayitbanner mt-4">
					<img src="<?=sabitr("Serüvene Başla")?>" class="resim">
					<div class="bilgi">
						<div class="yazi1"><?=sabit("Serüvene Başla")?></div>
						<div>
							<a href="<?=sabit("Serüvene Başla",2)?>" class="btn btn-ana"><?=sabit("Serüvene Başla",3)?> <i class="las la-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
</section>	







