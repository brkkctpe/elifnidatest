<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Yönetici Ekle</h5>
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
			<form action="javascript:;" method="post" id="yonetici" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="yonetici">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Ad</label>
							<input type="text" class="form-control" name="yonetici_ad" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Soyad</label>
							<input type="text" class="form-control" name="yonetici_soyad">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>E-Mail</label>
							<input type="text" class="form-control" name="yonetici_mail" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Telefon</label>
							<input type="text" class="form-control" name="yonetici_telefon" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Parola</label>
							<input type="password" class="form-control" name="yonetici_parola" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Rütbe</label>
							<select class="form-control" name="yonetici_ekip">
								<option value="0">Rütbe Seçebilirsin</option>
								<?php 
								$bak=query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_durum='1'");
								while($yaz=row($bak)){
									?><option value="<?=$yaz["rutbe_id"]?>"><?=ss($yaz["rutbe_adi"])?></option><?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<?=resimalan("yonetici_resim","Bilgisayardan Avatar Seçin","")?>
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

<?php }elseif($ickisim=="duzenle"){ ?>

<?php

$voku=row(query("SELECT * FROM ".prefix."_yonetici WHERE yonetici_id='".g("id")."'"));

?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Yönetici Düzenle</h5>
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
			<form action="javascript:;" method="post" id="yonetici" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="duzenle">
			<input type="hidden" class="form-control" name="ilkkisim" value="yonetici">
			<input type="hidden" class="form-control" name="yonetici_id" value="<?=$voku["yonetici_id"]?>">
			<input type="hidden" class="form-control" name="yonetici_parolam" value="<?=$voku["yonetici_parola"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Ad</label>
							<input type="text" class="form-control" name="yonetici_ad" value="<?=ss($voku["yonetici_ad"])?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Soyad</label>
							<input type="text" class="form-control" name="yonetici_soyad" value="<?=ss($voku["yonetici_soyad"])?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>E-Mail</label>
							<input type="text" class="form-control" name="yonetici_mail" value="<?=ss($voku["yonetici_mail"])?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Telefon</label>
							<input type="text" class="form-control" name="yonetici_telefon" value="<?=ss($voku["yonetici_telefon"])?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Parola</label>
							<input type="password" class="form-control" name="yonetici_parola" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Rütbe</label>
							<select class="form-control" name="yonetici_ekip">
								<option value="0">Rütbe Seçebilirsin</option>
								<?php 
								$bak=query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_durum='1'");
								while($yaz=row($bak)){
									?><option value="<?=$yaz["rutbe_id"]?>" <?=$voku["yonetici_ekip"]==$yaz["rutbe_id"] ? "selected" : ""?>><?=ss($yaz["rutbe_adi"])?></option><?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<?=resimalan("yonetici_resim","Bilgisayardan Avatar Seçin",$voku["yonetici_resim"])?>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Yönetici Listele</h5>
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
					<h3 class="card-label">Yönetici Listele</h3>
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
					$kurallar = $kurallar." (yonetici_ad LIKE '%".g("arama")."%' 
					or yonetici_soyad LIKE '%".g("arama")."%' 
					or yonetici_mail LIKE '%".g("arama")."%' 
					or yonetici_telefon LIKE '%".g("arama")."%' 
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_yonetici ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_yonetici 
				".$kurallar." ORDER BY yonetici_id DESC LIMIT $baslangic,$limit");
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
								<th scope="col">Soyad</th>
								<th scope="col">E-Mail</th>
								<th scope="col">Telefon</th>
								<th scope="col">Tarih</th>
								<th scope="col">Durum</th>
								<th scope="col">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["yonetici_id"]?>">
								<th scope="row"><?=$deger["yonetici_id"]?></th>
								<td><?=ss($deger["yonetici_ad"])?></td>
								<td><?=ss($deger["yonetici_soyad"])?></td>
								<td><?=ss($deger["yonetici_mail"])?></td>
								<td><?=ss($deger["yonetici_telefon"])?></td>
								<td><?=date("d.m.Y H:i",$deger["yonetici_kayitzaman"])?></td>
								<td><a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["yonetici_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["yonetici_id"]?>"><span class="label label-inline label-<?=$deger["yonetici_durum"]==1 ? "success" : "warning"?>"><?=$deger["yonetici_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="index.php?do=<?=$ilkkisim?>_duzenle&id=<?=$deger["yonetici_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["yonetici_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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