
		<div class="card mb-4">
			<div class="card-body">		
				<?php if($urunDizi["urun_id"]!=""){ ?>
					<h1><?=$urunDizi["urun_adi"]?></h1>
					<?=$urunDizi["urun_aciklama"]?>
				<?php }else{ ?>
					<div class="alert alert-danger text-center">
						Bu ürünü satın almadığınız için görüntüleyemezsiniz.
					</div>
					
				<?php } ?>
			</div>
		</div>