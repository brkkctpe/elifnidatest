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
		<div class="row g-3">
			<?php foreach($blogDizi as $key=>$deger){  ?>
			<div class="col-md-4">
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
			<?php } ?>
		</div>
	</div>
</section>

		