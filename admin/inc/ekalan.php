<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Ek Alan Ekle</h5>
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
			<form action="javascript:;" method="post" id="ekalan" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="ekalan">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Adı</label>
							<input type="text" class="form-control" name="ekalan_adi" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tür</label>
							<select name="ekalan_tur" class="form-control">
								<option value="0">Kısa Yazı (VARCHAR 255 KARAKTER)</option>
								<option value="1">Uzun Yazı (TEXTAREA)</option>
								<option value="2">Resim </option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Modül</label>
							<select name="ekalan_modul" class="form-control">
								<?php
									$modulayar = unserialize($config["ayar"]["ayarlar_sitemodul"]);
									$dizin = "modul";
									$dizinac = opendir($dizin) or die("dizin açılamadı");
									while($dyaz=readdir($dizinac)){
										if(!strstr($dyaz,".")){
											$menubilgi = array();
											if(file_exists("modul/".$dyaz."/bilgi.php")){
												require "modul/".$dyaz."/bilgi.php";
											}
											if($menubilgi["adi"]!="" and in_array($dyaz,$modulayar)){
											?>
												<option value="<?=$menubilgi["sql"]?>"><?=$menubilgi["adi"]?></option>
											<?php
											}
										}
									
									}
								?>
							</select>
						</div>
					</div>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Ek Alan Listele</h5>
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
					<h3 class="card-label">Ek Alan Listele</h3>
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
					$kurallar = $kurallar." (ekalan_adi LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$ekalan = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_ekalan ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($ekalan*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_ekalan 
				".$kurallar." ORDER BY ekalan_id DESC LIMIT $baslangic,$limit");
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
								<th scope="col">Sütun</th>
								<th scope="col">Tablo</th>
								<th scope="col">Tür</th>
								<th scope="col">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ 
								
								if($deger["ekalan_tur"]==0){$tur = "Kısa Yazı";}
								elseif($deger["ekalan_tur"]==1){$tur = "Uzun Yazı";}
								elseif($deger["ekalan_tur"]==2){$tur = "Resim";}
							
							?>
							<tr id="satir<?=$deger["ekalan_id"]?>">
								<th scope="row"><?=$deger["ekalan_id"]?></th>
								<td><?=ss($deger["ekalan_adi"])?></td>
								<td><?=ss($deger["ekalan_sutunadi"])?></td>
								<td><?=ss($deger["ekalan_modul"])?></td>
								<td><?=$tur?></td>
								<td>
									<a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["ekalan_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				<!--end: Datatable-->
			</div>
			<div class="card-footer">
			
				<?=sayfalama($ekalan,$ssayisi)?>
			</div>
		</div>
		<!--end::Card-->
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php } ?>