		
		<section id="bread">
			<div class="adi"><?=ss($sayfaDizi["sayfa_adi"])?></div>
		</section>
		
		
		<section id="etkinliklist">
			<div class="container">
				<div class="row">
					<?php foreach($etkinliklerDizi as $deger){ ?>
					<div class="col-md-6">
						<div class="etkinlikitem">
							<a href="<?=url.ss($deger["etkinlikler_permalink"])?>" data-lity class="resim">
								<img src="<?=rg($deger["etkinlikler_resim"])?>">
							</a>
							<a href="<?=url.ss($deger["etkinlikler_permalink"])?>" class="yazi1"><?=ss($deger["etkinlikler_keyw"])?></a>
							<a href="<?=url.ss($deger["etkinlikler_permalink"])?>" class="yazi2"><?=ss($deger["etkinlikler_adi"])?></a>
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
		</section>