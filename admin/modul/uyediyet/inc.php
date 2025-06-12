<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Diyet Taslak Ekle</h5>
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
	<div class="container-fluid">
		<div class="card">
			<form action="javascript:;" method="post" id="modul-uyediyet" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="uyediyet">
			<input type="hidden" class="form-control" name="uyediyet_uye" value="<?=g("uye")?>">
			<input type="hidden" class="form-control" name="uyediyet_dil" value="<?=$config["ayar"]["ayarlar_sitedil"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Adı</label>
									<input type="text" class="form-control" name="uyediyet_adi" required>
								</div>
							</div>
							<div class="col-md-12">
							  <div class="form-group">
								  <label>Diyet Yazısı</label>
								  <textarea class="form-control" name="uyediyet_aciklama" style="height:200px"></textarea>
							  </div>
							</div>
							<?php
							$diyettaslak_id = g("diyettaslak_id");
							$doku=row(query("SELECT * FROM ".prefix."_diyettaslak WHERE diyettaslak_id='$diyettaslak_id'"));
							$diyettaslak_detay = unserialize($doku["diyettaslak_detay"]);
							
							?>
							<div class="col-md-12">
								<div id="satira">
									<?php 
									if($diyettaslak_id!=""){
										for($i=0;$i<count($diyettaslak_detay["ogun"]);$i++){ ?>
										  <div class="ogun">
											  <div class="form-row">
												  <div class="col-12">
													  <div class="form-group">
														  <input type="text" class="form-control" name="uyediyet_detay[ogun][]" value="<?=$diyettaslak_detay["ogun"][$i]?>" placeholder="<?= pd("Öğün") ?>">
													  </div>
												  </div>
											  </div>
											  <div class="form-group">
												  <label><?= pd("Program") ?> *</label>
												  <textarea class="form-control summernote"  id="editor1" name="uyediyet_detay[program][]"><?=$diyettaslak_detay["program"][$i]?></textarea>
											  </div>
											  <hr>
										  </div>
										<?php 
										} 
									}else{
										for($i=0;$i<10;$i++){ ?>
										  <div class="ogun">
											  <div class="form-row">
												  <div class="col-12">
													  <div class="form-group">
														  <input type="text" class="form-control" name="uyediyet_detay[ogun][]" value="<?=$diyettaslak_detay["ogun"][$i]?>" placeholder="<?= pd("Öğün") ?>">
													  </div>
												  </div>
											  </div>
											  <div class="form-group">
												  <label><?= pd("Program") ?> *</label>
												  <textarea class="form-control summernote"  id="editor1" name="uyediyet_detay[program][]"><?=$diyettaslak_detay["program"][$i]?></textarea>
											  </div>
											  <hr>
										  </div>
										<?php 
										} 
									}
									?>
								  </div>
							</div>
							
							
							<?php ekalangetir($ilkkisim,$voku); ?>
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
					<div class="col-md-4">
						<div class="form-group">
							<label>Diyet Ara</label>
							<input type="text" class="form-control" data-keyupislem="modul-<?=$ilkkisim?>" data-keyupdeger="<?=g("uye")?>" data-keyupickisim="diyettaslakliste">
						</div>
						<div id="diyettaslakliste"></div>
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
$vbak=query("SELECT * FROM ".prefix."_uyediyet WHERE uyediyet_id='".g("id")."'");
$vsay=rows($vbak);
$voku=row($vbak);

?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Diyet Taslak Düzenle</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<a href="index.php?mo=<?=$ilkkisim."_listele&uye=".$voku["uyediyet_uye"]?>" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Listeye Dön</a>
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container-fluid">
		<form action="javascript:;" method="post" id="modul-uyediyet" data-ajaxform="true">
		<div class="card">
			<input type="hidden" class="form-control" name="ickisim" value="<?=$vsay<1 ? "ekle" : "duzenle"?>">
			<input type="hidden" class="form-control" name="ilkkisim" value="uyediyet">
			<input type="hidden" class="form-control" name="uyediyet_dil" value="<?=ss($yaz["dil_id"])?>">
			<input type="hidden" class="form-control" name="uyediyet_id" value="<?=ss($voku["uyediyet_id"])?>">
			<input type="hidden" class="form-control" name="uyediyet_uye" value="<?=ss($voku["uyediyet_uye"])?>">
			<input type="hidden" class="form-control" name="<?=$ilkkisim?>_sira" value="<?=$vanaoku[$ilkkisim."_sira"]?>">
			<input type="hidden" class="form-control" name="<?=$ilkkisim?>_anasayfa" value="<?=$vanaoku[$ilkkisim."_anasayfa"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Adı</label>
									<input type="text" class="form-control" name="uyediyet_adi" value="<?=ss($voku[$ilkkisim."_adi"])=="" ? ss($vanaoku[$ilkkisim."_adi"]) : ss($voku[$ilkkisim."_adi"])?>" required>
								</div>
							</div>
							<div class="col-md-12">
							  <div class="form-group">
								  <label>Diyet Yazısı</label>
								  <textarea class="form-control" name="uyediyet_aciklama" style="height:200px"><?=ss($voku[$ilkkisim."_aciklama"])?></textarea>
							  </div>
							</div>
							<div class="col-md-12">

							<?php
							$diyettaslak_id = g("diyettaslak_id");
							$doku=row(query("SELECT * FROM ".prefix."_diyettaslak WHERE diyettaslak_id='$diyettaslak_id'"));
							$diyettaslak_detay = unserialize($doku["diyettaslak_detay"]);
							$uyediyet_detay = unserialize($voku["uyediyet_detay"]);
							?>
							<div class="col-md-12">
								<div id="satira">
									<?php 
									if($diyettaslak_id!=""){
										for($i=0;$i<count($diyettaslak_detay["ogun"]);$i++){ ?>
										  <div class="ogun">
											  <div class="form-row">
												  <div class="col-12">
													  <div class="form-group">
														  <input type="text" class="form-control" name="uyediyet_detay[ogun][]" value="<?=$diyettaslak_detay["ogun"][$i]?>" placeholder="<?= pd("Öğün") ?>">
													  </div>
												  </div>
											  </div>
											  <div class="form-group">
												  <label><?= pd("Program") ?> *</label>
												  <textarea class="form-control summernote"  id="editor1" name="uyediyet_detay[program][]"><?=$diyettaslak_detay["program"][$i]?></textarea>
											  </div>
											  <hr>
										  </div>
										<?php 
										} 
									}else{
										for($i=0;$i<10;$i++){ ?>
										  <div class="ogun">
											  <div class="form-row">
												  <div class="col-12">
													  <div class="form-group">
														  <input type="text" class="form-control" name="uyediyet_detay[ogun][]" value="<?=$uyediyet_detay["ogun"][$i]?>" placeholder="<?= pd("Öğün") ?>">
													  </div>
												  </div>
											  </div>
											  <div class="form-group">
												  <label><?= pd("Program") ?> *</label>
												  <textarea class="form-control summernote"  id="editor1" name="uyediyet_detay[program][]"><?=$uyediyet_detay["program"][$i]?></textarea>
											  </div>
											  <hr>
										  </div>
										<?php 
										} 
									}
									?>
								  </div>
							</div>
							</div>
					
							<?php ekalangetir($ilkkisim,$voku); ?>
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
					<div class="col-md-4">
						<div class="form-group">
							<label>Diyet Ara</label>
							<input type="text" class="form-control" data-keyupislem="modul-<?=$ilkkisim?>" data-keyupdeger="<?=g("id")?>" data-keyupickisim="diyettaslaklisted">
						</div>
						<div id="diyettaslakliste"></div>
					</div>
				</div>	
			</div>
		</div>	
		</form>	
			
		
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Diyet Taslak Listele</h5>
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
					<h3 class="card-label">Diyet Taslak Listele</h3>
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
					<a href="index.php?mo=<?=$ilkkisim."_ekle&uye=".g("id");?>" class="btn btn-primary font-weight-bolder">
					<i class="la la-plus"></i>Yeni Ekle</a>
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = "";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (uyediyet_adi LIKE '%".g("arama")."%'
					or uye_ad LIKE '%".g("arama")."%'
					or uye_soyad LIKE '%".g("arama")."%'
					or uye_telefon LIKE '%".g("arama")."%'
					or uye_mail LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_uyediyet 
				INNER JOIN ".prefix."_uye ON ".prefix."_uye.uye_id = ".prefix."_uyediyet.uyediyet_uye
				".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_uyediyet 
				INNER JOIN ".prefix."_uye ON ".prefix."_uye.uye_id = ".prefix."_uyediyet.uyediyet_uye
				".$kurallar." ORDER BY uyediyet_id DESC LIMIT $baslangic,$limit");
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
								<th scope="col">Üye</th>
								<th scope="col">Adı</th>
								<th scope="col">Tarih</th>
								<th scope="col">Durum</th>
								<th scope="col">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["uyediyet_id"]?>">
								<th scope="row"><?=$deger["uyediyet_id"]?></th>
								<td><?=ss($deger["uye_ad"])?> <?=ss($deger["uye_soyad"])?></td>
								<td><input type="text" name="<?=$ilkkisim?>_adi" data-keyupislem="liste_guncelle" data-keyupdeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_adi" class="form-control" value="<?=ss($deger[$ilkkisim."_adi"]);?>"></td>
								
								<td><?=date("d.m.Y H:i",$deger["uyediyet_kayitzaman"])?></td>
								<td><a href="javascript:;" data-islem="modul-<?=$ilkkisim?>" data-deger="<?=$deger["uyediyet_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["uyediyet_id"]?>"><span class="label label-inline label-<?=$deger["uyediyet_durum"]==1 ? "success" : "warning"?>"><?=$deger["uyediyet_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="index.php?mo=<?=$ilkkisim?>_duzenle&id=<?=$deger["uyediyet_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="modul-<?=$ilkkisim?>" data-deger="<?=$deger["uyediyet_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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