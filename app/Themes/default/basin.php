<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>

<section id="medyapage">
	<div class="container">
		<div class="row g-3 ">
			<?php foreach($basinDizi as $deger){ ?>
				<?php if($deger["basin_video"]!=""){ ?>
				<div class="col-md-4">
					<a href="<?=ss($deger["basin_video"])?>" target="_blank" class="medyaitem">
						<img src="<?=rg($deger["basin_resim"])?>" class="resim">
						<div class="icon">
							<img src="<?=trg("icon/basin.png")?>">
						</div>
					</a>
				</div>
				<?php }else{ ?>
					<div class="col-md-4">
						<a href="<?=rg($deger["basin_resim"])?>" data-lity class="medyaitem">
							<img src="<?=rg($deger["basin_resim"])?>" class="resim">
						</a>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>