<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Etkinlikler Ekle</h5>
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
			<form action="javascript:;" method="post" id="modul-etkinlikler" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="etkinlikler">
			<input type="hidden" class="form-control" name="etkinlikler_dil" value="<?=$config["ayar"]["ayarlar_sitedil"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Adı</label>
							<input type="text" class="form-control" name="etkinlikler_adi" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Permalink</label>
							<input type="text" class="form-control" name="etkinlikler_permalink">
							<small>Bu kısım web sitemizden görünen url linki olacak. Boş bırakırsan otomatik oluşur.</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Etkinlik Açıklama</label>
							<input type="text" class="form-control" name="etkinlikler_desc">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Etkinlik Tarihi</label>
							<input type="text" class="form-control" name="etkinlikler_keyw">
						</div>
					</div>
					<div class="col-md-12">
						<?=resimalan("etkinlikler_resim","Bilgisayardan Resim Seçin","")?>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Açıklama</label>
							<textarea type="text" class="form-control summernote" name="etkinlikler_aciklama" id="kt_summernote_1"></textarea>
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
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="duzenle"){ ?>


<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Etkinlik Düzenle</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<a href="index.php?mo=<?=$ilkkisim."_listele"?>" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Listeye Dön</a>
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
	
		<ul class="nav nav-success nav-pills" id="myTab" role="tablist">
			<?php
			$bak=query("SELECT * FROM ".prefix."_dil WHERE dil_durum='1'");
			$no=0;
			while($yaz=row($bak)){
			?>
			<li class="nav-item">
				<a class="nav-link <?php if(g("dil")==$yaz["dil_id"]){ echo "active"; }elseif($no<1 and g("dil")==""){echo "active";}?>" id="dilpage-tab-<?=$no?>" data-toggle="tab" href="#dilpage-<?=$no?>">
					<?=ss($yaz["dil_adi"])?>
				</a>
			</li>
			<?php
			$no++;
			}
			?>
		</ul>
		<div class="tab-content mt-5" id="myTabContent">
			<?php
			$vanaoku=row(query("SELECT * FROM ".prefix."_".$ilkkisim." WHERE ".$ilkkisim."_id='".g("id")."'"));
			$bak=query("SELECT * FROM ".prefix."_dil WHERE dil_durum='1'");
			$no=0;
			while($yaz=row($bak)){
				
			$vbak=query("SELECT * FROM ".prefix."_etkinlikler WHERE etkinlikler_gid='".g("id")."' and etkinlikler_dil='".$yaz["dil_id"]."'");
			$vsay=rows($vbak);
			$voku=row($vbak);
			
			?>
			<div class="tab-pane fade <?php if(g("dil")==$yaz["dil_id"]){ echo "show active"; }elseif($no<1 and g("dil")==""){echo "show active";}?>" id="dilpage-<?=$no?>" role="tabpanel" aria-labelledby="dilpage-tab-<?=$no?>">
			
				<div class="card">
					<form action="javascript:;" method="post" id="modul-etkinlikler" data-ajaxform="true">
					<input type="hidden" class="form-control" name="ickisim" value="<?=$vsay<1 ? "ekle" : "duzenle"?>">
					<input type="hidden" class="form-control" name="ilkkisim" value="etkinlikler">
					<input type="hidden" class="form-control" name="etkinlikler_dil" value="<?=ss($yaz["dil_id"])?>">
					<input type="hidden" class="form-control" name="etkinlikler_id" value="<?=ss($voku["etkinlikler_id"])?>">
					<input type="hidden" class="form-control" name="etkinlikler_gid" value="<?=ss(g("id"))?>">
					<input type="hidden" class="form-control" name="<?=$ilkkisim?>_sira" value="<?=$vanaoku[$ilkkisim."_sira"]?>">
					<input type="hidden" class="form-control" name="<?=$ilkkisim?>_anasayfa" value="<?=$vanaoku[$ilkkisim."_anasayfa"]?>">
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Adı</label>
									<input type="text" class="form-control" name="etkinlikler_adi" value="<?=ss($voku[$ilkkisim."_adi"])=="" ? ss($vanaoku[$ilkkisim."_adi"]) : ss($voku[$ilkkisim."_adi"])?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Permalink</label>
									<input type="text" class="form-control" name="etkinlikler_permalink" value="<?=ss($voku["etkinlikler_permalink"])?>">
									<small>Bu kısım web sitemizden görünen url linki olacak. Boş bırakırsan otomatik oluşur.</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Etkinlik Açıklama</label>
									<input type="text" class="form-control" name="etkinlikler_desc" value="<?=ss($voku["etkinlikler_desc"])?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Etkinlik Tarihi</label>
									<input type="text" class="form-control" name="etkinlikler_keyw" value="<?=ss($voku["etkinlikler_keyw"])?>">
								</div>
							</div>
							<div class="col-md-12">
								<?=resimalan("etkinlikler_resim","Bilgisayardan Resim Seçin",$voku[$ilkkisim."_resim"]=="" ? $vanaoku[$ilkkisim."_resim"] : $voku[$ilkkisim."_resim"])?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Açıklama</label>
									<textarea type="text" class="form-control summernote" name="etkinlikler_aciklama" id="kt_summernote_1"><?=ss($voku["etkinlikler_aciklama"])?></textarea>
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
					</form>
				</div>			
			
			</div>
			<?php
			$no++;
			}
			?>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Etkinlik Listele</h5>
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
					<h3 class="card-label">Etkinlik Listele</h3>
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
					<a href="index.php?mo=<?=$ilkkisim."_ekle";?>" class="btn btn-primary font-weight-bolder">
					<i class="la la-plus"></i>Yeni Ekle</a>
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = "etkinlikler_id=etkinlikler_gid and";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (etkinlikler_adi LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_etkinlikler ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_etkinlikler 
				".$kurallar." ORDER BY etkinlikler_sira DESC LIMIT $baslangic,$limit");
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
								<th scope="col">Sıra</th>
								<th scope="col">Anasayfa</th>
								<th scope="col">Tarih</th>
								<th scope="col">Durum</th>
								<th scope="col">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["etkinlikler_id"]?>">
								<th scope="row"><?=$deger["etkinlikler_id"]?></th>
								<td><input type="text" name="<?=$ilkkisim?>_adi" data-keyupislem="liste_guncelle" data-keyupdeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_adi" class="form-control" value="<?=ss($deger[$ilkkisim."_adi"]);?>"></td>
								<td style="width:100px;"><input type="text" name="<?=$ilkkisim?>_sira" data-keyupislem="liste_guncelle" data-keyupdeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_gid{:}<?=ss($deger[$ilkkisim."_gid"]);?>{:}<?=$ilkkisim?>_sira" class="form-control" value="<?=ss($deger[$ilkkisim."_sira"]);?>"></td>
								<td style="width:100px;">
								<select class="form-control" data-changeislem="liste_guncelle" data-changedeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_gid{:}<?=ss($deger[$ilkkisim."_gid"]);?>{:}<?=$ilkkisim?>_anasayfa">
									<option value="0" <?=ss($deger[$ilkkisim."_anasayfa"])==0 ? "selected" : ""?>>Hayır</option>
									<option value="1" <?=ss($deger[$ilkkisim."_anasayfa"])==1 ? "selected" : ""?>>Evet</option>
								</select>
								</td>
								<td><?=date("d.m.Y H:i",$deger["etkinlikler_kayitzaman"])?></td>
								<td><a href="javascript:;" data-islem="modul-<?=$ilkkisim?>" data-deger="<?=$deger["etkinlikler_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["etkinlikler_id"]?>"><span class="label label-inline label-<?=$deger["etkinlikler_durum"]==1 ? "success" : "warning"?>"><?=$deger["etkinlikler_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="<?=url.$deger[$ilkkisim."_permalink"]?>" class="label label-inline label-success" target="_blank">Gör</a>
									<a href="index.php?mo=<?=$ilkkisim?>_duzenle&id=<?=$deger["etkinlikler_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="modul-<?=$ilkkisim?>" data-deger="<?=$deger["etkinlikler_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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