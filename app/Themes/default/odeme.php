<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>
<section id="urunpage">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
					<button class="nav-link active" id="kkarti-tab" data-bs-toggle="tab" data-bs-target="#kkarti" type="button" role="tab" aria-controls="kkarti" aria-selected="true">
					<?=pd("Kredi Kartı")?>
					</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="havale-tab" data-bs-toggle="tab" data-bs-target="#havale" type="button" role="tab" aria-controls="havale" aria-selected="false">
					<?=pd("Havale")?>
					</button>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				
				  <div class="tab-pane fade show active p-3" id="kkarti" role="tabpanel" aria-labelledby="kkarti-tab">
					<?php if($errorMessage!=""){ ?>
					<div class="alert alert-warning"><?=$errorMessage?></div>
					<?php } ?>
					<div id="iyzipay-checkout-form" class="responsive"></div>
				  </div>
				  
				  <div class="tab-pane fade p-3" id="havale" role="tabpanel" aria-labelledby="havale-tab">
					<?php if($errorMessage!=""){ ?>
						<div class="alert alert-warning"><?=$errorMessage?></div>
					<?php }else{ ?>
						<div class="row">
							<div class="col-12">
								<form action="<?=url.ld("odeme-havale")?>" method="post" class=" d-block">
									<input type="hidden" name="sepet_kod" value="<?=$sepet_kod?>">
									<h6 class="text-center mb-3">Ödemenizi havale ile yapacaksanız; aşağıdaki kodu/kodları havale açıklamasına yazmayı unutmayın.</h6>
									<h2 class="text-center mb-3"><?=$sepet_kod?></h2>
									<div class="text-center mb-3">
										<button type="submit" class="btn btn-success">Havale İle Ödeme Yapacağım</button>
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<?php foreach($hesapnumaralariDizi as $deger){ ?>
							<div class="col-md-4 col-6">
							  <div class="card m-0" >
								<div class="card-body">
								<img src="<?=rg($deger["hesapnumaralari_resim"])?>" style="width:100%;height:200px;object-fit:cover;margin-bottom:20px;">
								<?=$deger["hesapnumaralari_banka"]?><br><br>
								<?=$deger["hesapnumaralari_hesapsahibi"]?><br><br>
								<?=$deger["hesapnumaralari_iban"]?>
								</div>
							  </div>
							</div>
							<?php } ?>
						</div>
					<?php } ?>
				  </div>
				  
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>