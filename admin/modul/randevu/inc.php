<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php
if ($_GET["do"] == "randevu_ekle") {
    include "randevu_ekle.php";
    return;
}
?>
<pre>
<?php print_r($_GET); ?>
</pre>


<?php if($ickisim==""){
	
}elseif($ickisim=="listele"){ ?>
		
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Randevu Listele</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
	</div>
</div>
<!--end::Subheader-->
	<div class="container-fluid">
		<div class="card card-custom mb-5">
			<div class="card-body">
				<form action="index.php">
					<input type="hidden"  name="mo" value="<?=g("mo")?>">
					<input type="hidden"  name="uye" value="<?=g("uye")?>">
					<div class="form-group row mb-2" style="">
						<div class="col-md-2">
							<select class="form-control" name="urun">
								<option value="">Ürünler</option>
							<?php
							$bak=query("SELECT * FROM ".prefix."_urun WHERE urun_durum='1'");
							while($yaz=row($bak)){
								?><option <?=g("urun")==$yaz["urun_id"] ? "selected" : ""?> value="<?=$yaz["urun_id"]?>"><?=$yaz["urun_adi"]?></option><?php
							}
							?>
							</select>
						</div>
						<div class="col-md-2"><input type="text" class="form-control" name="arama" value="<?=g("arama")?>" placeholder="<?=pd("Arama")?>"></div>
						<div class="col-md-2">
						  <div class="input-group date dpYears" data-date-viewmode="years" data-date-format="dd/mm/yyyy" data-date="<?=g("tarih1")?>">
							  <input type="text" name="tarih1" class="form-control" placeholder="<?=date("d/m/Y")?>" aria-label="Right Icon" aria-describedby="dp-ig" autocomplete="off" value="<?=g("tarih1")?>">
							  <div class="input-group-append">
								  <button id="dp-ig" class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
							  </div>
							</div>
						</div>
						<div class="col-md-2">
						  <div class="input-group date dpYears" data-date-viewmode="years" data-date-format="dd/mm/yyyy" data-date="<?=g("tarih2")?>">
							  <input type="text" name="tarih2" class="form-control" placeholder="<?=date("d/m/Y")?>" aria-label="Right Icon" aria-describedby="dp-ig" autocomplete="off" value="<?=g("tarih2")?>">
							  <div class="input-group-append">
								  <button id="dp-ig" class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar f14"></i></button>
							  </div>
						  </div>
						</div>
						<div class="col-md-2"><button type="" class="btn btn-info btn-block"><?=pd("Ara")?></button></div>
						<div class="col-md-2"><a href="index.php" class="btn btn-outline-info btn-block"><?=pd("Temizle")?></a></div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container-fluid">
		<!--begin::Card-->
		
		
		<div class="card card-custom">
			<div class="card-header">
				<div class="card-title">
					<span class="card-icon">
						<i class="flaticon-list-2 text-primary"></i>
					</span>
					<h3 class="card-label">Randevu Listele</h3>
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
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = "sepet_odemedurum='1' and";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (urun_adi LIKE '%".g("arama")."%'
					or sepet_kod LIKE '%".g("arama")."%'
					or uye_mail LIKE '%".g("arama")."%'
					or uye_telefon LIKE '%".g("arama")."%'
					or uye_ad LIKE '%".g("arama")."%'
					or uye_soyad LIKE '%".g("arama")."%'
					) and";
				}
				
    			if(g("tarih1")!="" and g("tarih2")!=""){
    				$bastarih = strtotime(str_replace("/","-",g("tarih1")))-(60*5);
    				$bittarih = strtotime(str_replace("/","-",g("tarih2")))+(60*60*24);
					$kurallar = $kurallar." randevu_zaman>$bastarih and randevu_zaman<$bittarih and";
    				$bildirimtarih = date('d-m-Y H:i:s',$bastarih)." - ".date('d-m-Y H:i:s',$bittarih)." Aralığındaki tarihleri kapsamaktadır.";
    			}
				if(g("randevu_sepet")!=""){
					$kurallar = $kurallar." randevu_sepet='".g("randevu_sepet")."' and";
				}
				if(g("uye")!=""){
					$kurallar = $kurallar." randevu_uye='".g("uye")."' and";
				}
				if(g("randevu_gun")==1){
    				$bastarih = strtotime(date("d.m.Y"))-(60*5);
    				$bittarih = strtotime(date("d.m.Y"))+(60*60*24);
					$kurallar = $kurallar." randevu_zaman>$bastarih and randevu_zaman<$bittarih and";
				}
				if(g("randevu_gun")==2){
    				$bastarih = strtotime(date("d.m.Y"))+(60*60*24)-(60*5);
    				$bittarih = strtotime(date("d.m.Y"))+(60*60*24*2);
					$kurallar = $kurallar." randevu_zaman>$bastarih and randevu_zaman<$bittarih and";
				}
				if(g("randevu_gun")==3){
    				$bastarih = strtotime(date("d.m.Y"))-(60*5);
    				$bittarih = strtotime(date("d.m.Y"))+(60*60*24*7);
					$kurallar = $kurallar." randevu_zaman>$bastarih and randevu_zaman<$bittarih and";
				}
				if(g("randevu_gun")==4){
    				$bastarih = strtotime(date("d.m.Y"))-(60*5);
    				$bittarih = strtotime(date("d.m.Y"))+(60*60*24*30);
					$kurallar = $kurallar." randevu_zaman>$bastarih and randevu_zaman<$bittarih and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_randevu 
				INNER JOIN ".prefix."_sepet ON ".prefix."_sepet.sepet_id = ".prefix."_randevu.randevu_sepet
				INNER JOIN ".prefix."_urun ON ".prefix."_urun.urun_id = ".prefix."_randevu.randevu_tur
				INNER JOIN ".prefix."_uye ON ".prefix."_uye.uye_id = ".prefix."_randevu.randevu_uye
				".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_randevu 
				INNER JOIN ".prefix."_sepet ON ".prefix."_sepet.sepet_id = ".prefix."_randevu.randevu_sepet
				INNER JOIN ".prefix."_urun ON ".prefix."_urun.urun_id = ".prefix."_randevu.randevu_tur
				INNER JOIN ".prefix."_uye ON ".prefix."_uye.uye_id = ".prefix."_randevu.randevu_uye
				".$kurallar." ORDER BY randevu_zaman ASC LIMIT $baslangic,$limit");
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
								<th scope="col">Danışan</th>
								<th scope="col">Telefon</th>
								<th scope="col">Seans</th>
								<th scope="col">Program</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ 
								$randevusay=rows(query("SELECT * FROM ".prefix."_randevu 
								  INNER JOIN ".prefix."_sepet ON ".prefix."_sepet.sepet_id = ".prefix."_randevu.randevu_sepet
								  WHERE sepet_odemedurum='1' and sepet_uye='".$deger["uye_id"]."' and randevu_zaman>".time()."")); 
								
								if($randevusay==0){
									$kalan = '<span class="badge badge-danger">'.$randevusay.'</span>';
								}elseif($randevusay==1){
									$kalan = '<span class="badge badge-warning">'.$randevusay.'</span>';
								}else{
									$kalan = '<span class="badge badge-success">'.$randevusay.'</span>';
								}
								
								$olcumsay = rows(query("SELECT olcum_uye,olcum_kayitzaman FROM ".prefix."_olcum
								WHERE olcum_uye='".$yaz["uye_id"]."' and olcum_kayitzaman>".(time()-(60*60*24)).""));
								
								$diyetsay = rows(query("SELECT uyediyet_uye,uyediyet_kayitzaman FROM ".prefix."_uyediyet
								WHERE uyediyet_uye='".$yaz["uye_id"]."' and uyediyet_kayitzaman>".(time()-(60*60*24)).""));
							?>
							<tr id="satir<?=$deger["randevu_id"]?>">
								<td style="width:170px;"><input type="text" name="<?=$ilkkisim?>_zaman" data-keyupislem="liste_zamanguncelle" data-keyupdeger="_<?=$ilkkisim?>{:}<?=$ilkkisim?>_id{:}<?=ss($deger[$ilkkisim."_id"]);?>{:}<?=$ilkkisim?>_zaman" class="form-control" value="<?=date("d.m.Y H:i",$deger["randevu_zaman"])?>"></td>
								</th>
								<td>
									<?=$kalan?>
									<?=$diyetsay>0 ? "<span class='badge badge-success'>D</span>" : "<span class='badge badge-danger'>D</span>" ?>
									<?=$olcumsay>0 ? "<span class='badge badge-success'>Ö</span>" : "<span class='badge badge-danger'>Ö</span>" ?>
									<a href="index.php?do=uye_duzenle&id=<?=$deger["uye_id"]?>" target="_blank">
									<?=$deger["uye_ad"]?> 
									<?=$deger["uye_soyad"]?></a>
								</td>
								<td><a href="tel:<?=$deger["uye_telefon"]?>" target="_blank"><?=$deger["uye_telefon"]?></a></td>
								<td><?=$deger["randevu_seans"]?></td>
								<td><a href="index.php?do=urun_duzenle&id=<?=$deger["urun_id"]?>" target="_blank"><?=$deger["urun_adi"]?></a></td>
								
								
								<td class="text-right">
									<a href="index.php?mo=uyediyet_listele&id=<?=ss($deger["uye_id"]);?>" class="btn btn-primary btn-sm">
									  Diyet
									</a>
									<a href="index.php?do=uye_olcumler&id=<?=ss($deger["uye_id"]);?>" class="btn btn-primary btn-sm">
									  Ölçüm
									</a>
									<a href="index.php?mo=randevu_listele&uye=<?=ss($deger["uye_id"]);?>" class="btn btn-primary btn-sm">
									  Randevu
									</a>
									<a href="index.php?mo=sepet_listele&sepet_uye=<?=ss($deger["uye_id"]);?>" class="btn btn-primary btn-sm">
									  Sipariş
									</a>
									<a href="javascript:;" data-islem="otele" data-deger="<?=ss($deger["uye_id"]);?>{:}1" class="btn btn-danger btn-sm d-none">
									  +10</a>
									<a href="javascript:;" data-islem="otele" data-deger="<?=ss($deger["uye_id"]);?>{:}0" class="btn btn-danger btn-sm d-none">
									  -10</a>
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