		
<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($title)?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($title)?></a>
		</div>
	</div>
</section>
<section id="kayitpage">
	<div class="container">
		<?php 
		foreach($urunDizi as $deger){ ?>
		<div class="urunitem">
			<div class="row">
				<div class="col-md-8 order-2 order-md-1">
					<div class="dikeyortala justify-content-end">
						<div class="adi"><?=ss($deger["urun_adi"])?></div>
						<div class="desc"><?=ss($deger["urun_desc"])?></div>
						<div class="alt">
							<div class="fiyat"><?=ss($deger["urun_fiyat"])?> ₺</div>
							<a href="<?=url.ld("takvim")."/".$deger["urun_permalink"]?>" class="btn btn-ana"><?=pd("Sipariş ver")?> <i class="las la-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 order-1 order-md-2">
					<a href="<?=url.ld("takvim")."/".$deger["urun_permalink"]?>"><img src="<?=rg($deger["urun_resim"])?>" class="resim"></a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</section>	
		