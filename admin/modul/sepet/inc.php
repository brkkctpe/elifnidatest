<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="listele"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Randevu Listele</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<form action="index.php" method="get">
			<?php foreach($_GET as $key=>$deger){ if($key!="s" and $key!="arama"){ ?>
			<input type="hidden" name="<?=$key?>" value="<?=$deger?>">
			<?php } } ?>
			<input type="text" class="form-control" name="arama" placeholder="Ara + Enter">
			</form>
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container-fluid">
		<!--begin::Card-->
		<div class="card card-custom">
			<div class="card-header">
				<div class="card-title">
					<span class="card-icon">
						<i class="flaticon-list-2 text-primary"></i>
					</span>
					<h3 class="card-label">Randevu Listele</h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Dropdown-->
					<div class="dropdown dropdown-inline mr-2">
						<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="la la-download"></i>Dışa Aktar</button>
						<!--begin::Dropdown Menu-->
						<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
							<ul class="nav flex-column nav-hover">
								<li class="nav-item">
									<a href="javascript:;" onclick="yazdir('#yazdir')" class="nav-link">
										<i class="nav-icon la la-print"></i>
										<span class="nav-text">Yazdır</span>
									</a>
								</li>
							</ul>
						</div>
						<!--end::Dropdown Menu-->
					</div>
					<!--end::Dropdown-->
					<!--begin::Button-->
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = "";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (sepet_adi LIKE '%".g("arama")."%'
					) and";
				}
				if(g("sepet_odemedurum")!=""){
					$kurallar = $kurallar." sepet_odemedurum='".g("sepet_odemedurum")."' and";
				}
				if(g("sepet_uye")!=""){
					$kurallar = $kurallar." sepet_uye='".g("sepet_uye")."' and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_sepet 
				INNER JOIN ".prefix."_uye ON ".prefix."_uye.uye_id = ".prefix."_sepet.sepet_uye
				".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_sepet 
				INNER JOIN ".prefix."_uye ON ".prefix."_uye.uye_id = ".prefix."_sepet.sepet_uye
				".$kurallar." ORDER BY sepet_id DESC LIMIT $baslangic,$limit");
				$tableDizi = array();
				while($yaz=row($bak)){
					$tableDizi[] = $yaz;
				}
				?>
				<!--begin: Datatable-->
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#kod</th>
								<th scope="col">Alıcı</th>
								<th scope="col">Toplam</th>
								<th scope="col">Ö. Tür</th>
								<th scope="col">Ö. Durum</th>
								<th scope="col">Randevular</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ 
								if($deger["sepet_odemetur"]==1){
									$sepet_odemetur = "Kredi Kartı";
								}elseif($deger["sepet_odemetur"]==2){
									$sepet_odemetur = "Havale";
								}
							
							?>
							<tr id="satir<?=$deger["sepet_id"]?>">
								<th scope="row"><?=$deger["sepet_kod"]?></th>
								<td><a href="index.php?do=uye_duzenle&id=<?=$deger["uye_id"]?>"><?=$deger["uye_ad"]?> <?=$deger["uye_soyad"]?></a></td>
								<td><?=$deger["sepet_tutar"]?></td>
								<td><?=$sepet_odemetur?></td>
								
								<td style="width:130px;">
									<select class="form-control" data-changeislem="liste_guncelle" data-changedeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_odemedurum">
										<option value="0" <?=ss($deger[$ilkkisim."_odemedurum"])==0 ? "selected" : ""?>>Bekliyor</option>
										<option value="1" <?=ss($deger[$ilkkisim."_odemedurum"])==1 ? "selected" : ""?>>Alındı</option>
										<option value="2" <?=ss($deger[$ilkkisim."_odemedurum"])==2 ? "selected" : ""?>>İade Edildi</option>
									</select>
								</td>
								
								<td>
									<a href="index.php?mo=randevu_listele&randevu_sepet=<?=$deger["sepet_id"]?>" class="label label-inline label-success" target="_blank">Randevular</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				<!--end: Datatable-->
			</div>
			<div class="card-footer">
			
				<?=sayfalama($sayfa,$ssayisi)?>
			</div>
		</div>
		<!--end::Card-->
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php } ?>