<section id="slider">
	<div class="swiper slider">
	  <div class="swiper-wrapper">
		<?php foreach($sliderDizi as $deger){ ?>
		<div class="swiper-slide">
			<div class="item">
				<img src="<?=rg($deger["slider_resim"])?>" class="anaresim d-none d-md-block">
				<img src="<?=rg($deger["slider_mobilresim"])?>" class="anaresim d-block d-md-none">
				<div class="bilgi">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="yazi1"><?=ss($deger["slider_adi"])?></div>
								<h1 class="yazi2"><?=ss($deger["slider_yazi1"])?></h1>
								<div class="yazi3"><?=ss($deger["slider_yazi2"])?></div>
								
								<div class="butonlar">
									<a href="<?=url.ld("hakkimda")?>" class="btn btn-ana"><?=pd("Detaylı Bilgi")?> <i class="las la-arrow-right"></i></a>
									<a href="<?=url.ld("beslenme-programlari")?>" class="btn btn-seffaf"><?=pd("Neler Yaparız?")?> <i class="las la-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	  </div>
	</div>
</section>	
<section id="slideralt">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="<?=sabit("Slider Alt 1")?>" class="sol">
					<img src="<?=sabitr("Slider Alt 1")?>">
					<div><?=sabit("Slider Alt 1",2)?></div>
				</a>
			</div>
			<div class="col-md-6">
				<a href="<?=sabit("Slider Alt 2")?>" class="sag">
					<img src="<?=sabitr("Slider Alt 2")?>">
					<div>
						<b><?=sabit("Slider Alt 2",2)?></b>
						<small><?=sabit("Slider Alt 2",3)?></small>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<section id="hakkimizda">
	<img src="<?=sabitr("Anasayfa Hakkımda")?>" class="resim">
	<div class="container">
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="sag">
					<div class="yazi1"><?=sabit("Anasayfa Hakkımda")?></div>
					<div class="yazi2"><?=sabit("Anasayfa Hakkımda",2)?></div>
					<div class="yazi3"><?=sabit("Anasayfa Hakkımda",3)?></div>
					<div class="butonlar">
						<a href="<?=url.ld("hakkimda")?>" class="btn btn-ana"><?=pd("Ben Kimim")?> <i class="las la-arrow-right"></i></a>
						<a href="<?=sabit("Anasayfa Kliniğimizi Yakından Görün Link")?>" class="btn btn-seffaf" data-lity><i class="las la-play-circle"></i><?=pd("Kliniğimizi yakından görün")?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="logolar">
	<div class="container">
		<div class="row g-3 justify-content-center">
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-1.png")?>" alt="Beinsports">
			</div>
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-2.png")?>" alt="Hürriyet">
			</div>
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-3.png")?>" alt="Formsante">
			</div>
			<div class="col-md-3 col-6">
				<img src="<?=trg("logo-4.png")?>" alt="CNN Türk">
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

<section id="yolharita">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="baslik">
					<img src="<?=info("favicon")?>">
					<span><?=pd("Sağlıklı Beslenmenin Yol Haritası")?></span>
				</div>
				<div class="adimlar">
					<div class="adim">
						<div class="no"><?=sabit("Yol Harita 1")?></div>
						<div class="yazi">
							<b><?=sabit("Yol Harita 1",2)?></b>
							<small><?=sabit("Yol Harita 1",3)?></small>
						</div>
					</div>
					<div class="adim">
						<div class="no"><?=sabit("Yol Harita 2")?></div>
						<div class="yazi">
							<b><?=sabit("Yol Harita 2",2)?></b>
							<small><?=sabit("Yol Harita 2",3)?></small>
						</div>
					</div>
					<div class="adim">
						<div class="no"><?=sabit("Yol Harita 3")?></div>
						<div class="yazi">
							<b><?=sabit("Yol Harita 3",2)?></b>
							<small><?=sabit("Yol Harita 3",3)?></small>
						</div>
					</div>
					<div class="adim">
						<div class="no"><?=sabit("Yol Harita 4")?></div>
						<div class="yazi">
							<b><?=sabit("Yol Harita 4",2)?></b>
							<small><?=sabit("Yol Harita 4",3)?></small>
						</div>
					</div>
					<div class="adim">
						<div class="no"><?=sabit("Yol Harita 5")?></div>
						<div class="yazi">
							<b><?=sabit("Yol Harita 5",2)?></b>
							<small><?=sabit("Yol Harita 5",3)?></small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<form action="javascript:;" method="post" id="vki" data-ajaxform="true" class="sagform">
					<div class="bas"><?=pd("Vücut Kitle Endeksi Hesaplama")?></div>
					<div class="mb-3">
						<input type="text" class="form-control" name="boy" placeholder="<?=pd("Boy Uzunluğunuz (cm)")?>">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="kilo" placeholder="<?=pd("Vücut Ağırlığınız (kg)")?>">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="yas" placeholder="<?=pd("Yaşınız")?>">
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="bel" placeholder="<?=pd("Bel Çevreniz *Bilmiyorsanız lütfen boş bırakınız")?>">
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-ana"><?=pd("Hesapla")?> <i class="las la-arrow-right"></i></button>
					</div>
					<div class="">
						<div class="loader"></div>
						<div class="sonuc"></div>
					</div>
					<img src="<?=trg("metre.png")?>" class="metre" alt="metre">
				</form>
			</div>
		</div>
	</div>
</section>

<section id="galeri">
<div class="container">
<div class="baslik"><span><?=pd("Danışan Yorumları")?></span></div>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-03623e62-9961-474a-846c-e512a12f9a5b" data-elfsight-app-lazy></div>
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

<section id="faydalibilgiler">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="baslik">
					<img src="<?=info("favicon")?>">
					<span><?=pd("Faydalı Bilgiler")?></span>
				</div>
			</div>
			<div class="col-md-8">
				<div class="slide">
					<div class="swiper faydalibilgiler">
					  <div class="swiper-wrapper">
						<?php foreach($blogDizi as $key=>$deger){ if($key<3){ ?>
						<div class="swiper-slide">
							<a href="<?=url.$deger["blog_permalink"]?>" class="item">
								<?=ss($deger["blog_adi"])?>
							</a>
						</div>
						<?php } } ?>
					  </div>
					</div>
					<div class="faydalibilgiler-button-prev"><i class="las la-arrow-left"></i></div>
					<div class="faydalibilgiler-button-next"><i class="las la-arrow-right"></i></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="bloglar">
	<div class="container">
		<div class="swiper bloglar">
		  <div class="swiper-wrapper">
			<?php foreach($blogDizi as $key=>$deger){ if($key>2){ ?>
			<div class="swiper-slide">
				<a href="<?=url.$deger["blog_permalink"]?>" class="blogitem">
					<div class="resim">
						<img src="<?=rg($deger["blog_resim"])?>">
						<span>
							<i class="las la-arrow-circle-right"></i>
							<?=pd("İçeriği görüntüle")?>
						</span>
					</div>
					<div class="adi"><?=ss($deger["blog_adi"])?></div>
					<div class="desc"><?=kisalt(strip_tags($deger["blog_aciklama"]),200)?></div>
				</a>
			</div>
			<?php } } ?>
		  </div>
		</div>
		<div class="mt-5 text-center">
			<a href="<?=url.ld("blog")?>" class="btn btn-ana"><?=pd("En Faydalı Bilgiler")?> <i class="las la-arrow-right"></i></a>
		</div>
	</div>
</section>

<section id="tarifler">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="yazi1"><?=sabit("Anasayfa Tarifler")?></div>
				<div class="yazi2"><?=sabit("Anasayfa Tarifler",2)?></div>
				<div class="yazi3"><?=sabit("Anasayfa Tarifler",3)?></div>
				<div>
					<a href="<?=url.ld("tarifler")?>" class="btn btn-seffaf"><?=pd("Tüm Sağlıklı Tarifler")?> <i class="las la-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="swiper tarifler">
				  <div class="swiper-wrapper">
					<?php foreach($tariflerDizi as $deger){ ?>
					<div class="swiper-slide">
						<a href="<?=url.$deger["tarifler_permalink"]?>" class="tarifitem">
							<div class="resim">
								<img src="<?=rg($deger["tarifler_resim"])?>">
							</div>
							<div class="adi"><?=ss($deger["tarifler_adi"])?></div>
						</a>
					</div>
					<?php } ?>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="sss">
	<img src="<?=sabitr("Anasayfa SSS")?>" class="anaresim">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-7">
				<div class="yazi1"><?=sabit("Anasayfa SSS")?></div>
				<div class="yazi2"><?=sabit("Anasayfa SSS",2)?></div>
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
				<div>
					<a href="<?=url.ld("sss")?>" class="btn btn-seffaf"><?=pd("Tüm Merak Edilenler")?> <i class="las la-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>