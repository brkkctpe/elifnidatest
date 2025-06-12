<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "diyettaslak";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$diyettaslak_adi=ass(p("diyettaslak_adi"));
			$diyettaslak_detay=serialize($_POST["diyettaslak_detay"]);
			$diyettaslak_dil=ass(p("diyettaslak_dil"));
			$diyettaslak_gid=ass(p("diyettaslak_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			
			if($diyettaslak_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				$query="INSERT INTO ".prefix."_diyettaslak SET 
				".implode("",$ekler)."
				diyettaslak_adi='$diyettaslak_adi',
				diyettaslak_detay='$diyettaslak_detay',
				diyettaslak_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				diyettaslak_durum='1',
				diyettaslak_kayitzaman='".time()."',
				diyettaslak_dil='$diyettaslak_dil',
				diyettaslak_gid='$diyettaslak_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					$sonid = row(query("SELECT * FROM ".prefix."_diyettaslak ORDER BY diyettaslak_id DESC"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["diyettaslak_gid"]."&dil=".$diyettaslak_dil;
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
			$diyettaslak_id=ass(p("diyettaslak_id"));
			$diyettaslak_adi=ass(p("diyettaslak_adi"));
			$diyettaslak_detay=serialize($_POST["diyettaslak_detay"]);
			$diyettaslak_dil=ass(p("diyettaslak_dil"));
			$diyettaslak_gid=ass(p("diyettaslak_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			
			if($diyettaslak_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				
				
				$query="UPDATE ".prefix."_diyettaslak SET 
				".implode("",$ekler)."
				diyettaslak_adi='$diyettaslak_adi',
				diyettaslak_detay='$diyettaslak_detay'
				WHERE diyettaslak_id='$diyettaslak_id'
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
			$oku=row(query("SELECT * FROM ".prefix."_diyettaslak WHERE diyettaslak_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["diyettaslak_durum"]==1){
					query("UPDATE ".prefix."_diyettaslak SET diyettaslak_durum='0' WHERE diyettaslak_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_diyettaslak SET diyettaslak_durum='1' WHERE diyettaslak_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_diyettaslak WHERE diyettaslak_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["diyettaslak_permalink"]."'");
				query("DELETE FROM ".prefix."_diyettaslak WHERE diyettaslak_gid='$id'");
				$json['tost'] = 'success';
				$json['mesaj'] = 'Satır silindi.';
				$json['sil'] = '#satir'.$id;
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
		
}

echo json_encode($json);