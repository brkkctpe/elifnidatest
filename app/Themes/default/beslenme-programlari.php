		
<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($title)?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($title)?></a>
		</div>
	</div>
</section>
<?php if($kategoriOku["urunkategori_id"]>0){ ?>
<section id="paketpage">
	<div class="container">
		<div class="row justify-content-center mb-4">
			<div class="col-md-8">
				<img src="<?=rg($kategoriOku["urunkategori_resim"])?>" class="anaresim">
				<div class="aciklama">
					<?=ss($kategoriOku["urunkategori_aciklama"])?>
				</div>
			</div>
		</div>
	</div>
</section>	
<?php } ?>
<section id="kayitpage">
	<div class="container">
		<?php if($kategoriOku["urunkategori_id"]>0){ ?>
		<div class="row g-3 mb-3">
			<?php foreach($urunDizi as $deger){ ?>
			<div class="col-md-6">
				<a href="<?=url.$deger["urun_permalink"]?>" class="programitem">
					<img src="<?=rg($deger["urun_resim"])?>" class="resim">
					<div class="bilgi">
						<div class="adi"><?=ss($deger["urun_adi"])?></div>
						<div class="desc"><?=ss($deger["urun_desc"])?></div>
					</div>
				</a>
			</div>
			<?php } ?>
		</div>		
		<?php }else{ ?>
		<div class="row g-3 mb-3">
			<?php foreach($urunkategoriDizi as $deger){ ?>
			<div class="col-md-6">
				<a href="<?=url.$deger["urunkategori_permalink"]?>" class="programitem">
					<img src="<?=rg($deger["urunkategori_resim"])?>" class="resim">
					<div class="bilgi">
						<div class="adi"><?=ss($deger["urunkategori_adi"])?></div>
						<div class="desc"><?=ss($deger["urunkategori_desc"])?></div>
					</div>
				</a>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</section>		
		