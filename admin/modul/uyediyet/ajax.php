<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "uyediyet";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$uyediyet_uye=ass(p("uyediyet_uye"));
			$uyediyet_adi=ass(p("uyediyet_adi"));
			$uyediyet_aciklama=ass(p("uyediyet_aciklama"));
			$uyediyet_detay=serialize($_POST["uyediyet_detay"]);
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			
			if($uyediyet_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				$query="INSERT INTO ".prefix."_uyediyet SET 
				".implode("",$ekler)."
				uyediyet_uye='$uyediyet_uye',
				uyediyet_adi='$uyediyet_adi',
				uyediyet_aciklama='$uyediyet_aciklama',
				uyediyet_detay='$uyediyet_detay',
				uyediyet_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				uyediyet_durum='1',
				uyediyet_kayitzaman='".time()."'
				";
				$ekle=query($query);
				if($ekle){
					
					$sonid = row(query("SELECT * FROM ".prefix."_uyediyet ORDER BY uyediyet_id DESC"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["uyediyet_id"];
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Düzenle----------------------#
	if($ickisim=="duzenle"){
		if($config["yetki"]["duzenle"]==1){
			$uyediyet_id=ass(p("uyediyet_id"));
			$uyediyet_adi=ass(p("uyediyet_adi"));
			$uyediyet_aciklama=ass(p("uyediyet_aciklama"));
			$uyediyet_detay=serialize($_POST["uyediyet_detay"]);
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			
			if($uyediyet_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				
				
				$query="UPDATE ".prefix."_uyediyet SET 
				".implode("",$ekler)."
				uyediyet_adi='$uyediyet_adi',
				uyediyet_aciklama='$uyediyet_aciklama',
				uyediyet_detay='$uyediyet_detay'
				WHERE uyediyet_id='$uyediyet_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Durum----------------------#
	if($ickisim=="durum"){
		if($config["yetki"]["duzenle"]==1){
			$id = p("deger");
			$oku=row(query("SELECT * FROM ".prefix."_uyediyet WHERE uyediyet_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["uyediyet_durum"]==1){
					query("UPDATE ".prefix."_uyediyet SET uyediyet_durum='0' WHERE uyediyet_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_uyediyet SET uyediyet_durum='1' WHERE uyediyet_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-success">Aktif</span>';
				}
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Sil----------------------#
	if($ickisim=="sil"){
		if($config["yetki"]["sil"]==1){
			$id = p("deger");
			
			$oku=row(query("SELECT * FROM ".prefix."_uyediyet WHERE uyediyet_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["uyediyet_permalink"]."'");
				query("DELETE FROM ".prefix."_uyediyet WHERE uyediyet_gid='$id'");
				$json['tost'] = 'success';
				$json['mesaj'] = 'Satır silindi.';
				$json['sil'] = '#satir'.$id;
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}

	##-------------------------Rütbe Sil----------------------#
	if($ickisim=="diyettaslakliste"){
		if($config["yetki"]["duzenle"]==1){
			$deger = explode("{:}",p("deger"));
			$uye = $deger[0];
			$ara = $deger[1];
			
			ob_start();
			$bak=query("SELECT * FROM ".prefix."_diyettaslak WHERE diyettaslak_adi LIKE '%$ara%' ORDER BY diyettaslak_adi ASC LIMIT 0,10");
			while($yaz=row($bak)){
				?>
					<a href="index.php?mo=uyediyet_ekle&uye=<?=$uye?>&diyettaslak_id=<?=$yaz["diyettaslak_id"]?>" class="d-block mb-2"><?=ss($yaz["diyettaslak_adi"])?></a>
				<?php
			}
			$output = ob_get_contents();
			ob_end_clean();
			$json["degis"] = "#diyettaslakliste";
			$json["degisicerik"] = $output;	
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}	

	##-------------------------Rütbe Sil----------------------#
	if($ickisim=="diyettaslaklisted"){
		if($config["yetki"]["duzenle"]==1){
			$deger = explode("{:}",p("deger"));
			$id = $deger[0];
			$ara = $deger[1];
			
			ob_start();
			$bak=query("SELECT * FROM ".prefix."_diyettaslak WHERE diyettaslak_adi LIKE '%$ara%' ORDER BY diyettaslak_adi ASC LIMIT 0,10");
			while($yaz=row($bak)){
				?>
					<a href="index.php?mo=uyediyet_duzenle&id=<?=$id?>&diyettaslak_id=<?=$yaz["diyettaslak_id"]?>" class="d-block mb-2"><?=ss($yaz["diyettaslak_adi"])?></a>
				<?php
			}
			$output = ob_get_contents();
			ob_end_clean();
			$json["degis"] = "#diyettaslakliste";
			$json["degisicerik"] = $output;	
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}		
}

echo json_encode($json);