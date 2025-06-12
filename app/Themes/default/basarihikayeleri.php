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
			<?php foreach($referansDizi as $deger){ ?>
			<div class="col-md-4">
				<a href="<?=rg($deger["referans_resim"])?>" data-lity class="galeriitem">
					<img src="<?=rg($deger["referans_resim"])?>" class="resim">
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
		