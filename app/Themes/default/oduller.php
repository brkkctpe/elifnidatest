		
		<section id="bread">
			<div class="adi"><?=ss($sayfaDizi["sayfa_adi"])?></div>
		</section>
		
		
		<section id="etkinliklist">
			<div class="container">
				<div class="row">
					<?php foreach($odullerDizi as $deger){ ?>
					<div class="col-md-6">
						<div class="etkinlikitem">
							<a href="<?=url.ss($deger["oduller_permalink"])?>" data-lity class="resim">
								<img src="<?=rg($deger["oduller_resim"])?>">
							</a>
							<a href="<?=url.ss($deger["oduller_permalink"])?>" class="yazi1"><?=ss($deger["oduller_keyw"])?></a>
							<a href="<?=url.ss($deger["oduller_permalink"])?>" class="yazi2"><?=ss($deger["oduller_adi"])?></a>
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
		</section>