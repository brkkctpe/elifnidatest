<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rütbe Ekle</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<form action="javascript:;" method="post" id="rutbe" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="rutbe">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Rütbe Adı</label>
							<input type="text" class="form-control" name="rutbe_adi" value="<?=ss($voku["rutbe_adi"])?>" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="checkbox-inline">
							<label class="checkbox">
								<input type="checkbox" name="rutbe_ekle" value="1">
								<span></span>Eklemelere İzin Ver
							</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="checkbox-inline">
							<label class="checkbox">
								<input type="checkbox" name="rutbe_duzenle" value="1">
								<span></span>Düzenlemelere İzin Ver
							</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="checkbox-inline">
							<label class="checkbox">
								<input type="checkbox" name="rutbe_sil" value="1">
								<span></span>Silmelere İzin Ver
							</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="font-weight-bold text-center text-success bg-light p-4 mt-4 mb-4">Hangi Sayfalara Erişim Sağlasın</div>
					</div>
					
					<?php
					$dizin = "inc";
					$dizinac = opendir($dizin) or die("dizin açılamadı");
					$no=0;
					while($dyaz=readdir($dizinac)){ 
						if(strstr($dyaz,".php") and $dyaz!="." and $dyaz!=".."){
						?>	
						<div class="col-md-4">
						  <div class="checkbox-inline">
							  <label class="checkbox">
								<input name="rutbe_sayfa[]" value="<?=$dyaz?>" type="checkbox"/> 
								<span></span><?=$dyaz?>
							  </label>
						  </div>
						</div>
						<?php
						}
					$no++;
					}
					?>
					<div class="col-md-12">
						<div class="font-weight-bold text-center text-success bg-light p-4 mt-4 mb-4">Hangi Modüllere Erişim Sağlasın</div>
					</div>
					
					<?php
					$dizin = "modul";
					$dizinac = opendir($dizin) or die("dizin açılamadı");
					$no=0;
					while($dyaz=readdir($dizinac)){ 
						if(!strstr($dyaz,".php") and $dyaz!="." and $dyaz!=".."){
						?>	
						<div class="col-md-4">
						  <div class="checkbox-inline">
							  <label class="checkbox">
								<input name="rutbe_sayfa[]" value="<?=$dyaz?>" type="checkbox"/> 
								<span></span><?=$dyaz?>
							  </label>
						  </div>
						</div>
						<?php
						}
					$no++;
					}
					?>
					<div class="col-md-12">
						<br>
						<div class="sloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="duzenle"){ ?>

<?php

$voku=row(query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_id='".g("id")."'"));

?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rütbe Düzenle</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<a href="index.php?do=<?=$ilkkisim."_listele"?>" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Listeye Dön</a>
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<form action="javascript:;" method="post" id="rutbe" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="duzenle">
			<input type="hidden" class="form-control" name="ilkkisim" value="rutbe">
			<input type="hidden" class="form-control" name="rutbe_id" value="<?=$voku["rutbe_id"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Rütbe Adı</label>
							<input type="text" class="form-control" name="rutbe_adi" value="<?=ss($voku["rutbe_adi"])?>" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="checkbox-inline">
							<label class="checkbox">
								<input type="checkbox" name="rutbe_ekle" value="1" <?=ss($voku["rutbe_ekle"])==1 ? "checked" : ""?>>
								<span></span>Eklemelere İzin Ver
							</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="checkbox-inline">
							<label class="checkbox">
								<input type="checkbox" name="rutbe_duzenle" value="1" <?=ss($voku["rutbe_duzenle"])==1 ? "checked" : ""?>>
								<span></span>Düzenlemelere İzin Ver
							</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="checkbox-inline">
							<label class="checkbox">
								<input type="checkbox" name="rutbe_sil" value="1" <?=ss($voku["rutbe_sil"])==1 ? "checked" : ""?>>
								<span></span>Silmelere İzin Ver
							</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="font-weight-bold text-center text-success bg-light p-4 mt-4 mb-4">Hangi Sayfalara Erişim Sağlasın</div>
					</div>
					
					<?php
					$rutbe_sayfa = unserialize($voku["rutbe_sayfa"]);
					$dizin = "inc";
					$dizinac = opendir($dizin) or die("dizin açılamadı");
					$no=0;
					while($dyaz=readdir($dizinac)){ 
						if(strstr($dyaz,".php") and $dyaz!="." and $dyaz!=".."){
						$dyaz= str_replace(".php","",$dyaz);
						?>	
						<div class="col-md-4">
						  <div class="checkbox-inline">
							  <label class="checkbox">
								<input name="rutbe_sayfa[]" value="<?=$dyaz?>" type="checkbox" <?=in_array($dyaz,$rutbe_sayfa) ? "checked" : ""?>/> 
								<span></span><?=$dyaz?>
							  </label>
						  </div>
						</div>
						<?php
						}
					$no++;
					}
					?>
					<div class="col-md-12">
						<div class="font-weight-bold text-center text-success bg-light p-4 mt-4 mb-4">Hangi Modüllere Erişim Sağlasın</div>
					</div>
					
					<?php
					$dizin = "modul";
					$dizinac = opendir($dizin) or die("dizin açılamadı");
					$no=0;
					while($dyaz=readdir($dizinac)){ 
						if(!strstr($dyaz,".php") and $dyaz!="." and $dyaz!=".."){
						?>	
						<div class="col-md-4">
						  <div class="checkbox-inline">
							  <label class="checkbox">
								<input name="rutbe_sayfa[]" value="<?=$dyaz?>" type="checkbox" <?=in_array($dyaz,$rutbe_sayfa) ? "checked" : ""?>/> 
								<span></span><?=$dyaz?>
							  </label>
						  </div>
						</div>
						<?php
						}
					$no++;
					}
					?>
					<div class="col-md-12">
						<br>
						<div class="sloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="listele"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rütbe Listele</h5>
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
	<div class="container">
		<!--begin::Card-->
		<div class="card card-custom">
			<div class="card-header">
				<div class="card-title">
					<span class="card-icon">
						<i class="flaticon-list-2 text-primary"></i>
					</span>
					<h3 class="card-label">Rütbe Listele</h3>
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
					<a href="index.php?do=<?=$ilkkisim."_ekle";?>" class="btn btn-primary font-weight-bolder">
					<i class="la la-plus"></i>Yeni Ekle</a>
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = "";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (rutbe_adi LIKE '%".g("arama")."%' 
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_rutbe ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_rutbe 
				INNER JOIN ".prefix."_yonetici ON ".prefix."_yonetici.yonetici_id = ".prefix."_rutbe.rutbe_ekleyen
				".$kurallar." ORDER BY rutbe_id DESC LIMIT $baslangic,$limit");
				$tableDizi = array();
				while($yaz=row($bak)){
					$tableDizi[] = $yaz;
				}
				?>
				<!--begin: Datatable-->
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Adı</th>
								<th scope="col">Ekleyen</th>
								<th scope="col">Tarih</th>
								<th scope="col">Durum</th>
								<th scope="col">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["rutbe_id"]?>">
								<th scope="row"><?=$deger["rutbe_id"]?></th>
								<td><?=ss($deger["rutbe_adi"])?></td>
								<td><?=ss($deger["yonetici_ad"])?></td>
								<td><?=date("d.m.Y H:i",$deger["rutbe_kayitzaman"])?></td>
								<td><a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["rutbe_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["rutbe_id"]?>"><span class="label label-inline label-<?=$deger["rutbe_durum"]==1 ? "success" : "warning"?>"><?=$deger["rutbe_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="index.php?do=<?=$ilkkisim?>_duzenle&id=<?=$deger["rutbe_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["rutbe_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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