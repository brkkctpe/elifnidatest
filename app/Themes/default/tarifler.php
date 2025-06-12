		
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
		<div class="row g-3">
			<?php foreach($tariflerDizi as $deger){ ?>
			<div class="col-md-4">
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
</section>	
		