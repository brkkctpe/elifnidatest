		
		<div class="card mb-4">
			<div class="card-body">
				<?php if(count($urunDizi)>0){ ?>
				<h1 class="border-bottom pb-3 mb-3">Diyet Paketlerim</h1>
				<div class="row">
				<?php foreach($urunDizi as $deger){ ?>
					<div class="col-md-6">
						<div class="diyetlist">
						  <div class="sol"><?=$deger["urun_adi"]?></div>
						  <a href="<?=url."diyetdetay/".$deger["urun_id"]?>" class="badge badge-success p-3" >Detaya Git</a>
						</div>
					</div>
					<?php }?>
				</div>
					
				<?php } ?>
			
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-body">
				<h1 >Diyetlerim 
				<a href="javascript:;" onclick="yazdir()" class="badge badge-info p-1 ml-auto">Yazdır/PDF</a></h1>
				
				<div id="yazdirilacakBolge">
					<div class="row">
						<div class="col-md-12">
							<div class="diyeticlist">
							  <div class="sol"><?=$diyetDizi["uyediyet_adi"]?></div>
							  <div class="sag"><?=$diyetDizi["uyediyet_aciklama"]?></div>
							</div>
						</div>
					<?php 
					for($i=0;$i<count($diyetDizi["uyediyet_detay"]["ogun"]);$i++){ 
						if($diyetDizi["uyediyet_detay"]["program"][$i]!=""){
						?>
						<div class="col-md-12">
							<div class="diyeticlist">
							  <div class="sol"><?=$diyetDizi["uyediyet_detay"]["ogun"][$i]?></div>
							  <div class="sag"><?=$diyetDizi["uyediyet_detay"]["program"][$i]?></div>
							</div>
						</div>
						<?php 
						}
					}
					?>
					</div>
				</div>
				
				
				<div class="row">
					<?php foreach($blogDizi as $deger){ ?>
					<div class="col-md-4">
						<div class="card mb-2">
						  <img src="<?=rg($deger["blog_resim"])?>" style="width:100%;height:200px;object-fit:cover;" class="card-img-top" alt="...">
						  <div class="card-body">
							<h5 class="card-title"><?=$deger["blog_adi"]?></h5>
							<p class="card-text"><?=kisalt(strip_tags($deger["blog_aciklama"]),150)?></p>
							<a href="<?=url.$deger["blog_permalink"]?>" class="badge badge-success p-3">Oku</a>
						  </div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-body">
				<h1>Geçmiş Diyetlerim</h1>
				<div class="row">
				<?php 
				if(count($diyetlerDizi)>0){
					foreach($diyetlerDizi as $deger){ 
					?>
					<div class="col-md-6">
						<div class="diyetlist">
						  <div class="sol"><?=$deger["uyediyet_adi"]?></div>
						  <a href="<?=url."diyetlerim/".$deger["uyediyet_id"]?>" class="badge badge-success p-3" >Diyete Git</a>
						</div>
					</div>
					<?php
					}
				}else{
				?>
				<div class="alert alert-warning text-center">Listelenecek veri bulunamadı.</div>
				<?php
				}
				
				?>
				</div>
				
				<div class="mt-3">
					<?=psayfalama($ssayisi,$sayfa,$link)?>
				</div>
			</div>
		</div>