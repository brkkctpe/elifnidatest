<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kupon Ekle</h5>
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
			<form action="javascript:;" method="post" id="modul-kupon" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="kupon">
			<input type="hidden" class="form-control" name="kupon_dil" value="<?=$config["ayar"]["ayarlar_sitedil"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Adı</label>
							<input type="text" class="form-control" name="kupon_adi" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kod</label>
							<input type="text" class="form-control" name="kupon_kod">
							<small>Sepette müşterinin ekleyeceği kod</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kupon İndirim Miktarı</label>
							<input type="text" class="form-control" name="kupon_indirim">
							<small>Örneğin 1 TL indirim yapar</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kupon İndirim Yüzdesi</label>
							<input type="text" class="form-control" name="kupon_yuzde">
							<small>Örneğin yüzde 1 indirim yapar</small>
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

<?php }elseif($ickisim=="duzenle"){ ?>


<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kupon Düzenle</h5>
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
	
			<?php
			$vbak=query("SELECT * FROM ".prefix."_kupon WHERE kupon_id='".g("id")."'");
			$vsay=rows($vbak);
			$voku=row($vbak);
			
			?>
				<div class="card">
					<form action="javascript:;" method="post" id="modul-kupon" data-ajaxform="true">
					<input type="hidden" class="form-control" name="ickisim" value="<?=$vsay<1 ? "ekle" : "duzenle"?>">
					<input type="hidden" class="form-control" name="ilkkisim" value="kupon">
					<input type="hidden" class="form-control" name="kupon_id" value="<?=ss($voku["kupon_id"])?>">
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Adı</label>
									<input type="text" class="form-control" name="kupon_adi" value="<?=ss($voku["kupon_adi"])?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kod</label>
									<input type="text" class="form-control" name="kupon_kod" value="<?=ss($voku["kupon_kod"])?>">
									<small>Sepette müşterinin ekleyeceği kod</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kupon İndirim Miktarı</label>
									<input type="text" class="form-control" name="kupon_indirim" value="<?=ss($voku["kupon_indirim"])?>">
									<small>Örneğin 1 TL indirim yapar</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Kupon İndirim Yüzdesi</label>
									<input type="text" class="form-control" name="kupon_yuzde" value="<?=ss($voku["kupon_yuzde"])?>">
									<small>Örneğin yüzde 1 indirim yapar</small>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kupon Listele</h5>
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
					<h3 class="card-label">Kupon Listele</h3>
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
				$kurallar = "";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (kupon_adi LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_kupon ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_kupon 
				".$kurallar." ORDER BY kupon_id DESC LIMIT $baslangic,$limit");
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
								<th scope="col">Kod</th>
								<th scope="col">İndirim</th>
								<th scope="col">Yüzde</th>
								<th scope="col">Durum</th>
								<th scope="col">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["kupon_id"]?>">
								<th scope="row"><?=$deger["kupon_id"]?></th>
								<td><?=ss($deger["kupon_adi"])?></td>
								<td><?=ss($deger["kupon_kod"])?></td>
								<td><?=ss($deger["kupon_indirim"])?></td>
								<td><?=ss($deger["kupon_yuzde"])?></td>
								<td><a href="javascript:;" data-islem="modul-<?=$ilkkisim?>" data-deger="<?=$deger["kupon_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["kupon_id"]?>"><span class="label label-inline label-<?=$deger["kupon_durum"]==1 ? "success" : "warning"?>"><?=$deger["kupon_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="index.php?mo=<?=$ilkkisim?>_duzenle&id=<?=$deger["kupon_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="modul-<?=$ilkkisim?>" data-deger="<?=$deger["kupon_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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