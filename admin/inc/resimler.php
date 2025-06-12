<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="listele"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Resim Listele</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
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
					<h3 class="card-label">Resim Listele</h3>
				</div>
				<div class="card-toolbar">
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = "";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (ortam_adi LIKE '%".g("arama")."%' 
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_ortam ".$kurallar));
				$limit=12;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_ortam 
				".$kurallar." ORDER BY ortam_id DESC LIMIT $baslangic,$limit");
				$tableDizi = array();
				while($yaz=row($bak)){
					$tableDizi[] = $yaz;
				}
				?>
				<div class="row" id="ortam">
				<?php foreach($tableDizi as $deger){ ?>
				<div class="col-md-6"  id="satir<?=$deger["ortam_id"]?>">
					<div class="img">
						<img src="<?=rg($deger["ortam_dosya"])?>">
					</div>
					<div class="form-group">
						<input type="text" name="ortam_alt" data-keyupislem="liste_guncelle" data-keyupdeger="_ortam{:}ortam_id{:}<?=ss($deger["ortam_id"]);?>{:}ortam_alt" class="form-control" value="<?=ss($deger["ortam_alt"]);?>" placeholder="Alt">
					</div>
					<div class="form-group">
						<input type="text" name="ortam_title" data-keyupislem="liste_guncelle" data-keyupdeger="_ortam{:}ortam_id{:}<?=ss($deger["ortam_id"]);?>{:}ortam_title" class="form-control" value="<?=ss($deger["ortam_title"]);?>" placeholder="Title">
					</div>
					<button type="button" class="btn btn-sm btn-danger mb-4" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["ortam_id"]?>" data-ickisim="sil"
					style="position:absolute;
					top:10px;right:20px;"
					>SİL</button>
				</div>
				<?php } ?>
				</div>
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