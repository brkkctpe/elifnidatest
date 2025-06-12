<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($blogOku["blog_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.ld("blog")?>" class="active"><?=pd("Blog")?></a>
		</div>
	</div>
</section>
<section id="blogdetay">
	<div class="container">
		<div class="row g-3">
			<div class="col-md-12 text-center">
				<img src="<?=rg($blogOku["blog_resim"])?>" class="anaresim">
			</div>
			<div class="col-md-8">
				<div class="aciklama">
					<?=ss($blogOku["blog_aciklama"])?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sagblog">
					<div class="bas">
						<img src="<?=info("favicon")?>">
						<span><?=pd("Faydalı Bilgiler")?></span>
					</div>
					<?php foreach($blogDizi as $deger){ ?>
					<a href="<?=url.$deger["blog_permalink"]?>" class="blogk">
						<img src="<?=rg($deger["blog_resim"])?>" class="resim">
						<div class="adi"><?=ss($deger["blog_adi"])?></div>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

