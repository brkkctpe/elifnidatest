<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Üye Ekle</h5>
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
			<form action="javascript:;" method="post" id="uye" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="uye">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-4">
									<label class="mb-2"><?=pd("Tc Kimlik / Pasaport No")?> *</label>
									<input type="text" class="form-control" name="uye_tc" placeholder="<?=pd("Tc Kimlik / Pasaport No")?> *" data-zorunlu="1" required>
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Adınız")?> *</label>
									<input type="text" class="form-control" name="uye_ad" placeholder="<?=pd("Adınız")?> *" data-zorunlu="1" required>
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Soyadınız")?> *</label>
									<input type="text" class="form-control" name="uye_soyad" placeholder="<?=pd("Soyadınız")?> *" data-zorunlu="1" required>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="mb-2"><?=pd("E-mail")?> *</label>
							<input type="text" class="form-control" name="uye_mail" placeholder="<?=pd("E-mail")?> *" data-zorunlu="1" required>
						</div>
						<div class="form-group mb-3">
							<label class="mb-2"><?=pd("Cep Telefonu Numaranız")?> *</label>
							<input type="text" class="form-control telefon" name="uye_telefon" placeholder="<?=pd("Cep Telefonu Numaranız")?> *" data-zorunlu="1" required>
						</div>
						<div class="form-group mb-3">
							<label class="mb-2"><?=pd("Şifre")?> *</label>
							<input type="password" class="form-control" name="uye_parola" placeholder="<?=pd("Şifre")?> *"  required>
						</div>
						<div class="form-group mb-3">
							<label class="mb-2"><?=pd("Doğum Tarihiniz")?> *</label>
							<div class="row">
								<div class="col-4">
									<select class="form-control" name="uye_dgun">
										<option><?=pd("Gün")?></option>
										<?php for($i=1;$i<32;$i++){ ?>
										<option value="<?=$i?>"><?=$i?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-4">
									<select class="form-control" name="uye_day">
										<option><?=pd("Ay")?></option>
										<?php for($i=1;$i<13;$i++){ ?>
										<option value="<?=$i?>"><?=$i?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-4">
									<select class="form-control" name="uye_dyil">
										<option><?=pd("Yıl")?></option>
										<?php for($i=(date("Y")-68);$i<(date("Y")-1);$i++){ ?>
										<option value="<?=$i?>"><?=$i?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="mb-2"><?=pd("Adres")?> *</label>
							<textarea class="form-control" name="uye_adres" placeholder="<?=pd("Adres")?> *" ></textarea>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label class="mb-2"><?=pd("İl")?></label>
									<select class="form-control" name="uye_il" id="il">
										<option><?=pd("İl")?></option>
										<?= iller(); ?>
									</select>
								</div>
								<div class="col-6">
									<label class="mb-2"><?=pd("İlçe")?></label>
									<select class="form-control" name="uye_ilce" id="ilce">
										<option><?=pd("İlçe")?></option>
										<?= ilceler(); ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label class="mb-2"><?=pd("Meslek")?></label>
									<input type="text" class="form-control" name="uye_meslek" placeholder="<?=pd("Meslek")?>">
								</div>
								<div class="col-6">
									<label class="mb-2"><?=pd("Cinsiyet")?> *</label>
									<select class="form-control" name="uye_cinsiyet" >
										<option value="Erkek"><?=pd("Erkek")?></option>
										<option value="Kadın"><?=pd("Kadın")?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-4">
									<label class="mb-2"><?=pd("Boy")?> *</label>
									<input type="text" class="form-control" name="uye_boy" placeholder="<?=pd("Boy")?> (cm) * ">
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Kilo")?> *</label>
									<input type="text" class="form-control" name="uye_kilo" placeholder="<?=pd("Kilo")?> (kg) * ">
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Hedef Kilo")?> *</label>
									<input type="text" class="form-control" name="uye_hedefkilo" placeholder="<?=pd("Hedef Kilo")?> (kg) * ">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<?=resimalan("uye_resim","Bilgisayardan Avatar Seçin","")?>
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

$voku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_id='".g("id")."'"));

?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Üye Düzenle</h5>
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
	<div class="container-fluid">
		<div class="card">
			<form action="javascript:;" method="post" id="uye" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="duzenle">
			<input type="hidden" class="form-control" name="ilkkisim" value="uye">
			<input type="hidden" class="form-control" name="uye_id" value="<?=$voku["uye_id"]?>">
			<input type="hidden" class="form-control" name="uye_parolam" value="<?=$voku["uye_parola"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-4">
									<label class="mb-2"><?=pd("Tc Kimlik / Pasaport No")?> *</label>
									<input type="text" class="form-control" name="uye_tc" placeholder="<?=pd("Tc Kimlik / Pasaport No")?> *" value="<?=ss($voku["uye_tc"])?>" data-zorunlu="1" required>
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Adınız")?> *</label>
									<input type="text" class="form-control" name="uye_ad" placeholder="<?=pd("Adınız")?> *" data-zorunlu="1" value="<?=ss($voku["uye_ad"])?>" required>
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Soyadınız")?> *</label>
									<input type="text" class="form-control" name="uye_soyad" placeholder="<?=pd("Soyadınız")?> *" data-zorunlu="1" value="<?=ss($voku["uye_soyad"])?>" required>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-4">
									<label class="mb-2"><?=pd("E-mail")?> *</label>
									<input type="text" class="form-control" name="uye_mail" placeholder="<?=pd("E-mail")?> *" data-zorunlu="1" value="<?=ss($voku["uye_mail"])?>" required>
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Cep Telefonu Numaranız")?> *</label>
									<input type="text" class="form-control telefon" name="uye_telefon" placeholder="<?=pd("Cep Telefonu Numaranız")?> *" value="<?=ss($voku["uye_telefon"])?>" data-zorunlu="1" required>
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Şifre")?> *</label>
									<input type="password" class="form-control" name="uye_parola" placeholder="<?=pd("Şifre")?> *">
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="mb-2"><?=pd("Doğum Tarihiniz")?> *</label>
							<?php 
							$dt = explode("/",$voku["uye_dogumtarihi"])?> 
							<div class="row">
								<div class="col-4">
									<select class="form-control" name="uye_dgun" >
										<option><?=pd("Gün")?></option>
										<?php for($i=1;$i<32;$i++){ ?>
										<option value="<?=$i?>" <?=$dt[0]==$i ? "selected" : ""?> ><?=$i?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-4">
									<select class="form-control" name="uye_day" >
										<option><?=pd("Ay")?></option>
										<?php for($i=1;$i<13;$i++){ ?>
										<option value="<?=$i?>" <?=$dt[1]==$i ? "selected" : ""?> ><?=$i?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-4">
									<select class="form-control" name="uye_dyil">
										<option><?=pd("Yıl")?></option>
										<?php for($i=(date("Y")-68);$i<(date("Y")-1);$i++){ ?>
										<option value="<?=$i?>" <?=$dt[2]==$i ? "selected" : ""?> ><?=$i?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="mb-2"><?=pd("Adres")?> *</label>
							<textarea class="form-control" name="uye_adres" placeholder="<?=pd("Adres")?> *"><?=ss($voku["uye_adres"])?></textarea>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label class="mb-2"><?=pd("İl")?></label>
									<select class="form-control" name="uye_il" id="il">
										<option><?=pd("İl")?></option>
										<?= iller($voku["uye_il"]); ?>
									</select>
								</div>
								<div class="col-6">
									<label class="mb-2"><?=pd("İlçe")?></label>
									<select class="form-control" name="uye_ilce" id="ilce">
										<option><?=pd("İlçe")?></option>
										<?= ilceler($voku["uye_ilce"],$voku["uye_il"]); ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-6">
									<label class="mb-2"><?=pd("Meslek")?></label>
									<input type="text" class="form-control" name="uye_meslek" placeholder="<?=pd("Meslek")?>" value="<?=ss($voku["uye_meslek"])?>">
								</div>
								<div class="col-6">
									<label class="mb-2"><?=pd("Cinsiyet")?> *</label>
									<select class="form-control" name="uye_cinsiyet">
										<option value="Erkek" <?=$voku["uye_cinsiyet"]=="Erkek" ? "selected" : ""?>><?=pd("Erkek")?></option>
										<option value="Kadın" <?=$voku["uye_cinsiyet"]=="Kadın" ? "selected" : ""?>><?=pd("Kadın")?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="row">
								<div class="col-4">
									<label class="mb-2"><?=pd("Boy")?> *</label>
									<input type="text" class="form-control" name="uye_boy" placeholder="<?=pd("Boy")?> (cm) * " value="<?=ss($voku["uye_boy"])?>">
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Kilo")?> *</label>
									<input type="text" class="form-control" name="uye_kilo" placeholder="<?=pd("Kilo")?> (kg) * " value="<?=ss($voku["uye_kilo"])?>">
								</div>
								<div class="col-4">
									<label class="mb-2"><?=pd("Hedef Kilo")?> *</label>
									<input type="text" class="form-control" name="uye_hedefkilo" placeholder="<?=pd("Hedef Kilo")?> (kg) * " value="<?=ss($voku["uye_hedefkilo"])?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<?=resimalan("uye_resim","Bilgisayardan Avatar Seçin",$voku["uye_resim"])?>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Üye Listele</h5>
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
					<h3 class="card-label">Üye Listele</h3>
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
					$kurallar = $kurallar." (uye_ad LIKE '%".g("arama")."%'
					or uye_soyad LIKE '%".g("arama")."%'
					or uye_mail LIKE '%".g("arama")."%'
					or uye_telefon LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_uye ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_uye 
				".$kurallar." ORDER BY uye_id DESC LIMIT $baslangic,$limit");
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
							<tr id="satir<?=$deger["uye_id"]?>">
								<th scope="row"><?=$deger["uye_id"]?></th>
								<td><?=ss($deger["uye_ad"])?></td>
								<td><?=ss($deger["uye_soyad"])?></td>
								<td><?=ss($deger["uye_mail"])?></td>
								<td><?=ss($deger["uye_telefon"])?></td>
								<td><?=date("d.m.Y H:i",$deger["uye_kayitzaman"])?></td>
								<td><a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["uye_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["uye_id"]?>"><span class="label label-inline label-<?=$deger["uye_durum"]==1 ? "success" : "warning"?>"><?=$deger["uye_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="index.php?do=<?=$ilkkisim?>_duzenle&id=<?=$deger["uye_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["uye_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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

<?php }elseif($ickisim=="olcumler"){ ?>

<?php
$uye_id = g("id");
$voku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_id='$uye_id'"));

?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?=$voku["uye_ad"]." ".$voku["uye_soyad"]?> Ölçümleri</h5>
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
					<h3 class="card-label"><?=$voku["uye_ad"]." ".$voku["uye_soyad"]?> Ölçümleri</h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Dropdown-->
					<!--end::Dropdown-->
					<!--begin::Button-->
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = " olcum_uye='".g("id")."' and";

				if(g("arama")!=""){
				  $kurallar = $kurallar." (olcum_tarih LIKE '%".g("arama")."%' ) and";
				}
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_olcum ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  

				$bak=query("SELECT * FROM ".prefix."_olcum ".$kurallar." ORDER BY olcum_id DESC LIMIT $baslangic,$limit");
				$tableDizi = array();
				while($yaz=row($bak)){
					$tableDizi[] = $yaz;
				}
				?>
				<!--begin: Datatable-->
					<table class="table">
						<thead>
							<tr>
							  <th scope="col">Tarih</th>
							  <th scope="col">Ağırlık</th>
							  <th scope="col">Bel</th>
							  <th scope="col">Göbek</th>
							  <th scope="col">Üst Kol</th>
							  <th scope="col">Üst Bacak</th>
							  <th scope="col">Kalça</th>
							  <th scope="col">Göğüs</th>
							  <th scope="col">Boyun</th>
							  <th scope="col">Resim</th>
							  <th scope="col">Detay</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["olcum_id"]?>">
								  <td><?=$deger["olcum_tarih"]?></td>
								  <td><?=$deger["olcum_agirlik"]?></td>
								  <td><?=$deger["olcum_bel"]?></td>
								  <td><?=$deger["olcum_gobek"]?></td>
								  <td><?=$deger["olcum_ustkol"]?></td>
								  <td><?=$deger["olcum_ustbacak"]?></td>
								  <td><?=$deger["olcum_kalca"]?></td>
								  <td><?=$deger["olcum_gogus"]?></td>
								  <td><?=$deger["olcum_boyun"]?></td>
								  <td>
									<?php if($yaz["olcum_resim"]!=""){ ?>
										<a href="<?=url."app/Images/".$yaz["olcum_resim"]?>" target="_blank">Resim Gör</a>
									<?php }else{ ?>
										Resim Yok
									<?php } ?>
								  </td>
								<td>
									<a href="index.php?do=uye_olcum&id=<?=$yaz["olcum_id"]?>" class="btn btn-info btn-sm" target="_blank">Tüm Detayı Gör</a>
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

<?php }elseif($ickisim=="olcum"){ ?>

<?php
$kurallar = " olcum_id='".g("id")."' and";

$kurallar = substr_replace($kurallar, '', -3);
if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

$sayfa = g("s") ? g("s") : 1;
$ksayisi=rows(query("SELECT * FROM ".prefix."_olcum ".$kurallar));
$limit=20;
$ssayisi=ceil($ksayisi/$limit);
$baslangic=($sayfa*$limit)-$limit;			  

$bak=query("SELECT * FROM ".prefix."_olcum ".$kurallar." ");
$yaz=row($bak);

$uye_id = $yaz["olcum_uye"];
$voku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_id='$uye_id'"));

?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?=$voku["uye_ad"]." ".$voku["uye_soyad"]?> Ölçümleri</h5>
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
					<h3 class="card-label"><?=$voku["uye_ad"]." ".$voku["uye_soyad"]?> Ölçümleri</h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Dropdown-->
					<!--end::Dropdown-->
					<!--begin::Button-->
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<table class="table table-striped table-advance table-hover">
			  <tbody>
			  <?php 
			  

				  
			  ?>
			  <tr>
				  <td >Tarih</td>
				  <td><?=$yaz["olcum_tarih"]?></td>
			  </tr>
			  <tr>
				  <td>Ağırlık</td>
				  <td><?=$yaz["olcum_agirlik"]?></td>
			  </tr>
			  <tr>
				  <td>Bel</td>
				  <td><?=$yaz["olcum_bel"]?></td>
			  </tr>
			  <tr>
				  <td>Göbek</td>
				  <td><?=$yaz["olcum_gobek"]?></td>
			  </tr>
			  <tr>
				  <td>Üst Kol</td>
				  <td><?=$yaz["olcum_ustkol"]?></td>
			  </tr>
			  <tr>
				  <td>Üst Bacak</td>
				  <td><?=$yaz["olcum_ustbacak"]?></td>
			  </tr>
			  <tr>
				  <td>Kalça</td>
				  <td><?=$yaz["olcum_kalca"]?></td>
			  </tr>
			  <tr>
				  <td>Göğüs</td>
				  <td><?=$yaz["olcum_gogus"]?></td>
			  </tr>
			  <tr>
				  <td>Boyun</td>
				  <td><?=$yaz["olcum_boyun"]?></td>
			  </tr>
			  <tr>
				  <td>Ödem</td>
				  <td><?=$yaz["olcum_odem"]==1 ? "Var" : "Yok"?></td>
			  </tr>
			  <tr>
				  <td>Kabızlık</td>
				  <td><?=$yaz["olcum_kabizlik"]==1 ? "Var" : "Yok"?></td>
			  </tr>
			  <tr>
				  <td>Regl Öncesi</td>
				  <td><?=$yaz["olcum_regloncesi"]==1 ? "Evet" : "Hayır"?></td>
			  </tr>
			  <tr>
				  <td>Diyete Uyum</td>
				  <td>
					  <?php
						if($yaz["olcum_uyum"]==1){ echo "Diyet dışı kaçamak yaptım"; }
						elseif($yaz["olcum_uyum"]==5){ echo "Diyet dışı kaçamak yapmadım"; }
						elseif($yaz["olcum_uyum"]==2){ echo "2 veya daha az kaçamak"; }
						elseif($yaz["olcum_uyum"]==3){ echo "2'den fazla kaçamak"; }
						elseif($yaz["olcum_uyum"]==4){ echo "Diyete Neredeyse Hiç Uymadım"; }
					  ?>
				  </td>
			  </tr>
			  <tr>
				  <td>Egzersiz Miktarları</td>
				  <td>
					  <?php
						if($yaz["olcum_egzersiz"]==1){ echo "Hiç"; }
						elseif($yaz["olcum_egzersiz"]==2){ echo "1-2 kez"; }
						elseif($yaz["olcum_egzersiz"]==3){ echo "3-4 kez"; }
						elseif($yaz["olcum_egzersiz"]==4){ echo "5 kez ve üzeri"; }
					  ?>
				  </td>
			  </tr>
			  <tr>
				  <td>Mesajım</td>
				  <td><?=$yaz["olcum_mesaj"]?></td>
			  </tr>
			  <tr>
				  <td>Resim</td>
				  <td>
					<?php if($yaz["olcum_resim"]!=""){ ?>
						<a href="<?=rg($yaz["olcum_resim"])?>" target="_blank">Resim Gör</a>
					<?php }else{ ?>
						Resim Yok
					<?php } ?>
				  </td>
			  </tr>
			  </tbody>
		  </table>	
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