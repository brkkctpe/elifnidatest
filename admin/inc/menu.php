<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Menü Ekle</h5>
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
			<form action="javascript:;" method="post" id="menu" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="menu">
			<input type="hidden" class="form-control" name="menu_dil" value="<?=$config["ayar"]["ayarlar_sitedil"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Adı</label>
							<input type="text" class="form-control" name="menu_adi" required>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Menü Düzenle</h5>
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
	
			<?php
			$vbak=query("SELECT * FROM ".prefix."_menu WHERE menu_gid='".g("id")."'");
			$vsay=rows($vbak);
			$voku=row($vbak);
			
			?>
			<div class="card">
				<form action="javascript:;" method="post" id="menu" data-ajaxform="true">
				<input type="hidden" class="form-control" name="ickisim" value="<?=$vsay<1 ? "ekle" : "duzenle"?>">
				<input type="hidden" class="form-control" name="ilkkisim" value="menu">
				<input type="hidden" class="form-control" name="menu_dil" value="<?=ss($voku["menu_dil"])?>">
				<input type="hidden" class="form-control" name="menu_id" value="<?=ss($voku["menu_id"])?>">
				<input type="hidden" class="form-control" name="menu_gid" value="<?=ss(g("id"))?>">
				
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Adı</label>
								<input type="text" class="form-control" name="menu_adi" value="<?=ss($voku["menu_adi"])?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-block btn-primary"
								onclick="
									$('#varyasyon').find('[name=ickisim]').val('menulinkekle');
									$('#varyasyon').find('[name=menulink_id]').val('');
									$('#varyasyon').find('[name=menulink_adi]').val('');
									$('#varyasyon').find('[name=menulink_link]').val('');
									$('#varyasyon').find('[name=menulink_resimortam]').val('');
									$('#varyasyon .resimupload img').attr('src','http://localhost/newmvc/app/Images/noimage.jpg');
									$('#varyasyon').find('[name=menulink_yenisekme]').removeAttr('checked');
								
								"
							data-toggle="modal" data-target="#varyasyon">Yeni Link Ekle</button>
							<div id="menulinklist" class="mt-2">
								<?php
									$bak=query("SELECT * FROM ".prefix."_menulink ");
									while($yaz=row($bak)){
										?>
										<div class="row">
											<div class="col-md-8">
												<a href="javascript:;" class="btn btn-sm btn-block btn-info mb-2"><?=$yaz["menulink_adi"]?> - <?=$yaz["menulink_link"]?></a>
											</div>
											<div class="col-md-4">
												<a href="javascript:;" 
												onclick="
													$('#varyasyon').find('[name=ickisim]').val('menulinkduzenle');
													$('#varyasyon').find('[name=menulink_id]').val('<?=$yaz["menulink_id"]?>');
													$('#varyasyon').find('[name=menulink_adi]').val('<?=$yaz["menulink_adi"]?>');
													$('#varyasyon').find('[name=menulink_link]').val('<?=ss($yaz["menulink_link"])?>');
													$('#varyasyon').find('[name=menulink_resimortam]').val('<?=ss($yaz["menulink_resim"])?>');
													$('#varyasyon .resimupload img').attr('src','<?=rg($yaz["menulink_resim"])?>');
													<?php if(ss($yaz["menulink_yenisekme"])==1){ ?>
													$('#varyasyon').find('[name=menulink_yenisekme]').attr('checked','checked');
													<?php }else{ ?>
													$('#varyasyon').find('[name=menulink_yenisekme]').removeAttr('checked');
													<?php } ?>
													
												
												"
												data-toggle="modal" data-target="#varyasyon" 
												class="btn btn-sm btn-primary mb-2"><i class="las la-edit"></i></a>
												<a href="javascript:;" data-islem="menu" data-deger="<?=$voku["menu_id"]?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menulinksil"  
												class="btn btn-sm btn-danger mb-2"><i class="las la-trash"></i></a>
												<a href="javascript:;" data-islem="menu" data-deger="<?=$voku["menu_id"]?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menuekle"  
												class="btn btn-sm btn-success mb-2">>></a>
											</div>
										</div>
										<?php
									}
									
								?>
							</div>
						</div>
						<div class="col-md-6">
							<?php
							$sonuc = unserialize($voku["menu_json"]);
							
							?>
							<textarea id="nestable-output" name="menu_json" style="display:none;"></textarea>
							<div class="dd w-100" id="nestable">
								<ol class="dd-list">
								<?= menunest($sonuc,$voku["menu_id"]); ?>
								</ol>
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


<!-- Modal-->
<div class="modal fade" id="varyasyon" tabindex="-1" role="dialog" aria-labelledby="varyasyon" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="javascript:;" method="post" id="menu" data-ajaxform="true">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="varyasyon">Menüye Link </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="menulink_id" value="">
				<input type="hidden" name="ickisim" value="menulinkekle">
				<input type="hidden" name="ilkisim" value="menu">
				<input type="hidden" name="menu_id" value="<?=$voku["menu_id"]?>">
				<div class="form-group">
					<label>Adı</label>
					<input type="text" class="form-control" name="menulink_adi">
				</div>
				<div class="form-group">
					<label>Link</label>
					<input type="text" class="form-control" name="menulink_link">
				</div>
				<div class="form-group">
					<?=resimalan("menulink_resim","Bilgisayardan Resim Seçin","")?>
				</div>
				<div class="form-group">
					<label>Yeni Sekme</label>
				   <span class="switch switch-outline switch-icon switch-primary">
					<label>
					 <input type="checkbox" name="menulink_yenisekme" value="1"/>
					 <span></span>
					</label>
				   </span>
				</div>
				<div class="form-group">
					<div class="sloader"></div>
					<div class="sonuc"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary font-weight-bold">Kayıt Et</button>
			</div>
		</div>
	</div>
</div>


<?php }elseif($ickisim=="listele"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Menü Listele</h5>
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
					<h3 class="card-label">Menü Listele</h3>
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
				$kurallar = "menu_id=menu_gid and";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (menu_adi LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_menu ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;	
				
				$bak=query("SELECT * FROM ".prefix."_menu 
				".$kurallar." ORDER BY menu_id DESC LIMIT $baslangic,$limit");
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
								<th scope="col">Tarih</th>
								<th scope="col">Dil</th>
								<th scope="col">Durum</th>
								<th scope="col">İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["menu_id"]?>">
								<th scope="row"><?=$deger["menu_id"]?></th>
								<td><?=ss($deger["menu_adi"])?></td>
								<td><?=date("d.m.Y H:i",$deger["menu_kayitzaman"])?></td>
								<td>
								<select class="form-control" data-changeislem="liste_guncelle" data-changedeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_dil">
									<?php 
									$bak=query("SELECT * FROM ".prefix."_dil WHERE dil_durum='1'");
									$no=0;
									while($yaz=row($bak)){
									?>
									<option value="<?=$yaz["dil_id"]?>" <?=ss($deger[$ilkkisim."_dil"])==$yaz["dil_id"] ? "selected" : ""?>><?=$yaz["dil_adi"]?></option>
									<?php
									}
									?>
								</select>
								</td>
								<td><a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["menu_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["menu_id"]?>"><span class="label label-inline label-<?=$deger["menu_durum"]==1 ? "success" : "warning"?>"><?=$deger["menu_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="index.php?do=<?=$ilkkisim?>_duzenle&id=<?=$deger["menu_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["menu_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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