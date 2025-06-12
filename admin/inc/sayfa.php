<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="ekle"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Sayfa Ekle</h5>
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
			<form action="javascript:;" method="post" id="sayfa" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="ekle">
			<input type="hidden" class="form-control" name="ilkkisim" value="sayfa">
			<input type="hidden" class="form-control" name="sayfa_dil" value="<?=$config["ayar"]["ayarlar_sitedil"]?>">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Adı</label>
							<input type="text" class="form-control" name="sayfa_adi" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Permalink</label>
							<input type="text" class="form-control" name="sayfa_permalink">
							<small>Bu kısım web sitemizden görünen url linki olacak. Boş bırakırsan otomatik oluşur.</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Sayfa Açıklama</label>
							<input type="text" class="form-control" name="sayfa_desc">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Sayfa Anahtar Kelimeler</label>
							<input type="text" class="form-control" name="sayfa_keyw">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Git Link</label>
							<input type="text" class="form-control" name="sayfa_gitlink">
							<small>Eğer sayfayı başka bir web sitesine yönlendirmek istiyorsanız buraya o linki yazın.</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Modul</label>
							<select name="sayfa_modul" class="form-control">
								<option value="">Seçebilirsin</option>
								<?php
									$dizin = "../app/Pages/".theme;
									$dizinac = opendir($dizin) or die("dizin açılamadı");
									while($dyaz=readdir($dizinac)){
									
										if(strstr($dyaz,".") && $dyaz!="." && $dyaz!=".."){
												
												?><option value="<?=$dyaz?>"><?=$dyaz?></option><?php
										}
									
									}
								?>
							</select>
							<small>Burası yazılımcı ile ilgilidir. Bilginiz yoksa dokunmayın.</small>
						</div>
					</div>
					<div class="col-md-4">
						<?=resimalan("sayfa_resim","Bilgisayardan Resim Seçin","")?>
					</div>
					<div class="col-md-4">
						<?=resimalan("sayfa_resim2","Bilgisayardan Resim Seçin","")?>
					</div>
					<div class="col-md-4">
						<?=resimalan("sayfa_resim3","Bilgisayardan Resim Seçin","")?>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Açıklama</label>
							<textarea type="text" class="form-control summernote" name="sayfa_aciklama" id="kt_summernote_1"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Açıklama 2</label>
							<textarea type="text" class="form-control summernote" name="sayfa_aciklama2" id="kt_summernote_2"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Açıklama 3</label>
							<textarea type="text" class="form-control summernote" name="sayfa_aciklama3" id="kt_summernote_3"></textarea>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Sayfa Düzenle</h5>
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
			$bak=query("SELECT * FROM ".prefix."_dil WHERE dil_durum='1'");
			$no=0;
			while($yaz=row($bak)){
				
			$vbak=query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_gid='".g("id")."' and sayfa_dil='".$yaz["dil_id"]."'");
			$vsay=rows($vbak);
			$voku=row($vbak);
			
			?>
			<div class="tab-pane fade <?php if(g("dil")==$yaz["dil_id"]){ echo "show active"; }elseif($no<1 and g("dil")==""){echo "show active";}?>" id="dilpage-<?=$no?>" role="tabpanel" aria-labelledby="dilpage-tab-<?=$no?>">
			
				<div class="card">
					<form action="javascript:;" method="post" id="sayfa" data-ajaxform="true">
					<input type="hidden" class="form-control" name="ickisim" value="<?=$vsay<1 ? "ekle" : "duzenle"?>">
					<input type="hidden" class="form-control" name="ilkkisim" value="sayfa">
					<input type="hidden" class="form-control" name="sayfa_dil" value="<?=ss($yaz["dil_id"])?>">
					<input type="hidden" class="form-control" name="sayfa_id" value="<?=ss($voku["sayfa_id"])?>">
					<input type="hidden" class="form-control" name="sayfa_gid" value="<?=ss(g("id"))?>">
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Adı</label>
									<input type="text" class="form-control" name="sayfa_adi" value="<?=ss($voku["sayfa_adi"])?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Permalink</label>
									<input type="text" class="form-control" name="sayfa_permalink" value="<?=ss($voku["sayfa_permalink"])?>">
									<small>Bu kısım web sitemizden görünen url linki olacak. Boş bırakırsan otomatik oluşur.</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Sayfa Açıklama</label>
									<input type="text" class="form-control" name="sayfa_desc" value="<?=ss($voku["sayfa_desc"])?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Sayfa Anahtar Kelimeler</label>
									<input type="text" class="form-control" name="sayfa_keyw" value="<?=ss($voku["sayfa_keyw"])?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Git Link</label>
									<input type="text" class="form-control" name="sayfa_gitlink" value="<?=ss($voku["sayfa_gitlink"])?>">
									<small>Eğer sayfayı başka bir web sitesine yönlendirmek istiyorsanız buraya o linki yazın.</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Modul</label>
									<select name="sayfa_modul" class="form-control">
										<option value="">Seçebilirsin</option>
										<?php
											$dizin = "../app/Pages/".theme;
											$dizinac = opendir($dizin) or die("dizin açılamadı");
											while($dyaz=readdir($dizinac)){
											
												if(strstr($dyaz,".") && $dyaz!="." && $dyaz!=".."){
														
														?><option <?=ss($voku["sayfa_modul"])==$dyaz ? "selected" : ""?> value="<?=$dyaz?>"><?=$dyaz?></option><?php
												}
											
											}
										?>
									</select>
									<small>Burası yazılımcı ile ilgilidir. Bilginiz yoksa dokunmayın.</small>
								</div>
							</div>
							<div class="col-md-4">
								<?=resimalan("sayfa_resim","Bilgisayardan Resim Seçin",$voku["sayfa_resim"])?>
							</div>
							<div class="col-md-4">
								<?=resimalan("sayfa_resim2","Bilgisayardan Resim Seçin",$voku["sayfa_resim2"])?>
							</div>
							<div class="col-md-4">
								<?=resimalan("sayfa_resim3","Bilgisayardan Resim Seçin",$voku["sayfa_resim3"])?>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Açıklama</label>
									<textarea type="text" class="form-control summernote" name="sayfa_aciklama" id="kt_summernote_1"><?=ss($voku["sayfa_aciklama"])?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Açıklama2</label>
									<textarea type="text" class="form-control summernote" name="sayfa_aciklama2" id="kt_summernote_2"><?=ss($voku["sayfa_aciklama2"])?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Açıklama3</label>
									<textarea type="text" class="form-control summernote" name="sayfa_aciklama3" id="kt_summernote_3"><?=ss($voku["sayfa_aciklama3"])?></textarea>
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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Sayfa Listele</h5>
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
					<h3 class="card-label">Sayfa Listele</h3>
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
				$kurallar = "sayfa_id=sayfa_gid and";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (sayfa_adi LIKE '%".g("arama")."%'
					or sayfa_soyad LIKE '%".g("arama")."%'
					or sayfa_mail LIKE '%".g("arama")."%'
					or sayfa_telefon LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_sayfa ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_sayfa 
				".$kurallar." ORDER BY sayfa_id DESC LIMIT $baslangic,$limit");
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
							<tr id="satir<?=$deger["sayfa_id"]?>">
								<th scope="row"><?=$deger["sayfa_id"]?></th>
								<td><input type="text" name="<?=$ilkkisim?>_adi" data-keyupislem="liste_guncelle" data-keyupdeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_adi" class="form-control" value="<?=ss($deger[$ilkkisim."_adi"]);?>"></td>
								<td style="width:100px;"><input type="text" name="<?=$ilkkisim?>_sira" data-keyupislem="liste_guncelle" data-keyupdeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_sira" class="form-control" value="<?=ss($deger[$ilkkisim."_sira"]);?>"></td>
								<td style="width:100px;">
								<select class="form-control" data-changeislem="liste_guncelle" data-changedeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_anasayfa">
									<option value="0" <?=ss($deger[$ilkkisim."_anasayfa"])==0 ? "selected" : ""?>>Hayır</option>
									<option value="1" <?=ss($deger[$ilkkisim."_anasayfa"])==1 ? "selected" : ""?>>Evet</option>
								</select>
								</td>
								<td><?=date("d.m.Y H:i",$deger["sayfa_kayitzaman"])?></td>
								<td><a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["sayfa_id"]?>" data-ickisim="durum" id="durumbuton<?=$deger["sayfa_id"]?>"><span class="label label-inline label-<?=$deger["sayfa_durum"]==1 ? "success" : "warning"?>"><?=$deger["sayfa_durum"]==1 ? "Aktif" : "Pasif"?></span></a></td>
								<td>
									<a href="<?=url.$deger[$ilkkisim."_permalink"]?>" class="label label-inline label-success" target="_blank">Gör</a>
									<a href="index.php?do=<?=$ilkkisim?>_duzenle&id=<?=$deger["sayfa_id"]?>" class="label label-inline label-info">Düzenle</a>
									<a href="javascript:;" data-islem="<?=$ilkkisim?>" data-deger="<?=$deger["sayfa_id"]?>" data-ickisim="sil" class="label label-inline label-danger">Sil</a>
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