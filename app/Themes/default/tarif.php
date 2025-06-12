<section id="bread" class="pembe">
	<div class="container">
		<h1 class="baslik"><?=ss($tariflerOku["tarifler_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.ld("tarifler")?>" class="active"><?=pd("Tarifler")?></a>
		</div>
	</div>
</section>
<section id="blogdetay">
	<div class="container">
		<div class="row g-3">
			<div class="col-md-12 text-center">
				<img src="<?=rg($tariflerOku["tarifler_resim"])?>" class="anaresim2">
			</div>
			<div class="col-md-8">
				<div class="aciklama">
					<?=ss($tariflerOku["tarifler_aciklama"])?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sagblog">
					<?php foreach($tariflerDizi as $deger){ ?>
					<a href="<?=url.$deger["tarifler_permalink"]?>" class="blogk">
						<img src="<?=rg($deger["tarifler_resim"])?>" class="resim">
						<div class="adi"><?=ss($deger["tarifler_adi"])?></div>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

