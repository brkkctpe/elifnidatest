<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>

<section id="hakkimizda">
	<img src="<?=rg($sayfaDizi["sayfa_resim"])?>" class="resim">
	<div class="container">
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="sag">
					<div class="yazi1"><?=ss($sayfaDizi["sayfa_desc"])?></div>
					<h1 class="yazi2"><?=ss($sayfaDizi["sayfa_keyw"])?></h1>
					<div class="aciklama">
						<?=ss($sayfaDizi["sayfa_aciklama"])?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="hakkimizda" class="sag">
	<img src="<?=rg($sayfaDizi["sayfa_resim2"])?>" class="resim">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="sag">
					<div class="aciklama">
						<?=ss($sayfaDizi["sayfa_aciklama2"])?>
					</div>
				</div>
			</div>
			<div class="col-md-7"></div>
		</div>
	</div>
</section>

<section id="logolar">
	<div class="container">
		<div class="row g-3 justify-content-center">
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-1.png")?>">
			</div>
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-2.png")?>">
			</div>
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-3.png")?>">
			</div>
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-4.png")?>">
			</div>
		</div>
	</div>
</section>


<section id="beslenmeprogrami">
	<div class="container">
		<div class="baslik">
			<small><?=sabit("Anasayfa Programlar")?></small>
			<?=sabit("Anasayfa Programlar",2)?>
		</div>
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
		
		<div class="row mb-5">
			<?php foreach($urunkategoriDizi2 as $deger){ ?>
			<div class="col-md-6">
				<a href="<?=url.$deger["urunkategori_permalink"]?>" class="programitemk">
					<div class="icon">
						<img src="<?=rg($deger["urunkategori_resimk"])?>">
					</div>
					<div class="yazi">
						<b><?=ss($deger["urunkategori_adi"])?></b>
						<small><?=ss($deger["urunkategori_desc"])?></small>
					</div>
				</a>
			</div>
			<?php } ?>
		</div>
		<div class="altuyari">
			<?=sabit("Anasayfa Programlar",3)?> <a href="<?=url.ld("beslenme-programlari")?>"><?=pd("Programları İncele")?></a>
		</div>
	</div>
</section>


<section id="galeri">
	<div class="container">
		<div class="ustbaslik"><?=sabit("Anasayfa Mutlu Danışanlar")?></div>
		<div class="baslik">
			<img src="<?=sabitr("Anasayfa Mutlu Danışanlar")?>">
			<span><?=sabit("Anasayfa Mutlu Danışanlar",2)?></span>
		</div>
	</div>
	<div class="swiper galeri">
	  <div class="swiper-wrapper">
		<?php foreach($referansDizi as $deger){ ?>
		<div class="swiper-slide">
			<a href="<?=rg($deger["referans_resim"])?>" data-fancybox="mutludanisan" class="galeriitem">
				<img src="<?=rg($deger["referans_resim"])?>" class="resim">
			</a>
		</div>
		<?php } ?>
	  </div>
	</div>
	<div class="container text-center">
		<img src="<?=sabitr("Anasayfa Mutlu Danışanlar",2)?>" class="altresim">
	</div>
</section>