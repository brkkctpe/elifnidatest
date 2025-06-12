		<h1 class="border-bottom pb-3 mb-3">Ölçüm Görüntüle
		<a href="javascript:;" onclick="yazdir()" class="btn btn-info btn-sm float-right">Yazdır/PDF</a></h1>
		<div id="yazdirilacakBolge">
		<div class="row">
			<div class="col-md-9">
				<form action="javascript:;" method="post" id="olcum-duzenle" data-ajaxform="true">
				  <div class="form-group">
					<label>Ölçüm Tarihi : <?=$olcumDizi["olcum_tarih"]?></label>
				  </div>
				  <div class="form-group">
					<label>Ağırlık(kg) : <?=$olcumDizi["olcum_agirlik"]?></label>
				  </div>
				  <div class="form-group">
					<label>Bel Çevresi(cm) : <?=$olcumDizi["olcum_bel"]?></label>
				  </div>
				  <div class="form-group">
					<label>Göbek Çevresi(cm) : <?=$olcumDizi["olcum_gobek"]?></label>
				  </div>
				  <div class="form-group">
					<label>Üst Kol Çevresi(cm) : <?=$olcumDizi["olcum_ustkol"]?></label>
				  </div>
				  <div class="form-group">
					<label>Üst Bacak Çevresi(cm) : <?=$olcumDizi["olcum_ustbacak"]?></label>
				  </div>
				  <div class="form-group">
					<label>Kalça Çevresi(cm) : <?=$olcumDizi["olcum_kalca"]?></label>
				  </div>
				  <div class="form-group">
					<label>Göğüs Çevresi(cm) : <?=$olcumDizi["olcum_gogus"]?></label>
				  </div>
				  <div class="form-group">
					<label>Boyun Çevresi(cm) : <?=$olcumDizi["olcum_boyun"]?></label>
				  </div>
				  <div class="form-group">
					<?php if($olcumDizi["olcum_resim"]!=""){ ?>
					<img src="<?=url."app/Images/".$olcumDizi["olcum_resim"]?>" style="max-height:300px;">
					<?php } ?>
				  </div>
				  <h3 class="mt-2 mb-2 border-bottom">Haftanın Özeti</h3>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Ekstra Durumlar</div>
				  <div class="form-row">
					<div class="col-md-3">
						Ödem ve Şişkinlik : <?=$olcumDizi["olcum_odem"]==1 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-3">
						Kabızlık : <?=$olcumDizi["olcum_kabizlik"]==1 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-3">
						Regl Öncesi : <?=$olcumDizi["olcum_regloncesi"]==1 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-3">
						Regl Sonrası : <?=$olcumDizi["olcum_reglsonrasi"]==1 ? "<strong>Evet</strong>" : ""?>
					</div>
				  </div>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Diyete Uyum Durumu</div>
				  <div class="form-row">
					<div class="col-md-6">
						Diyet dışı kaçamak yapmadım : <?=$olcumDizi["olcum_uyum"]==5 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-6">
						Diyet dışı kaçamak yaptım : <?=$olcumDizi["olcum_uyum"]==1 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-6">
						2 veya daha az kaçamak : <?=$olcumDizi["olcum_uyum"]==2 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-6">
						2'den fazla kaçamak : <?=$olcumDizi["olcum_uyum"]==3 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-6">
						Diyete Neredeyse Hiç Uymadım : <?=$olcumDizi["olcum_uyum"]==4 ? "<strong>Evet</strong>" : ""?>
					</div>
				  </div>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Haftalık Egzersiz Miktarları</div>
				  <div class="form-row">
					<div class="col-md-3">
						Hiç : <?=$olcumDizi["olcum_egzersiz"]==1 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-3">
						1-2 kez : <?=$olcumDizi["olcum_egzersiz"]==2 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-3">
						3-4 kez : <?=$olcumDizi["olcum_egzersiz"]==3 ? "<strong>Evet</strong>" : ""?>
					</div>
					<div class="col-md-3">
						5 kez ve üzeri : <?=$olcumDizi["olcum_egzersiz"]==4 ? "<strong>Evet</strong>" : ""?>
					</div>
				  </div>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Mesajınız ve Özel İstekleriniz</div>
				  <div class="form-group">
					<?=$olcumDizi["olcum_mesaj"]?>
				  </div>
			
			</div>
		</div>
		</div>