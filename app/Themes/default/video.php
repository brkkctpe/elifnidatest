<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>
		
		
		<section id="videolar">
			<div class="container">
				<div class="row">
					<?php foreach($videoDizi as $deger){ ?>
					<div class="col-md-4">
						<a href="<?=$deger["video_link"]?>" data-lity class="videoitem" data-aos="fade-up">
							<div class="resim">
								<img src="<?=rg($deger["video_resim"])?>">
								<div class="icon">
							    <img src="<?=trg("icon/icon-9.png")?>">
						        </div>
							</div>
							<div class="adi"><?=ss($deger["video_adi"])?></div>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>	