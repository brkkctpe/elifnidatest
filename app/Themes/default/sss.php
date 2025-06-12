<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>
<section id="kayitpage">
	<div class="container">
		<div class="row g-3 justify-content-center">
			<div class="col-md-8">
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
			</div>
			<div class="col-md-4">
				<a href="<?=url.ld("blog")?>" class="kayitbanner mb-3">
					<img src="<?=trg("faybil.jpg")?>" class="resim">
					<div class="bilgi">
						<div class="yazi1"><?=pd("Faydalı Bilgiler")?></div>
					</div>
				</a>
				<a href="<?=url.ld("tarifler")?>" class="kayitbanner mb-3">
					<img src="<?=trg("sagtar.jpg")?>" class="resim">
					<div class="bilgi">
						<div class="yazi1"><?=pd("Sağlıklı Tarifler")?></div>
					</div>
				</a>
				<div class="kayitbanner">
					<img src="<?=trg("yeniuyelikback.jpg")?>" class="resim">
					<div class="bilgi">
						<div class="yazi1"><?=pd("Beslenme Serüveninize bugün başlayın!")?></div>
						<div>
							 <a href="<?=url.ld("kayit")?>" class="btn btn-ana"><?=pd("Hemen Üye Ol")?> <i class="las la-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

		