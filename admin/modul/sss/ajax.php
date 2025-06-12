<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "sss";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$sss_adi=ass(p("sss_adi"));
			$sss_permalink=ass(p("sss_permalink"));
			$sss_aciklama=ass($_POST["sss_aciklama"]);
			$sss_dil=ass(p("sss_dil"));
			$sss_gid=ass(p("sss_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($sss_permalink==""){
				$sss_permalink = permalink($sss_adi)."-".rand(1000,9999);
			}else{
				$sss_permalink = permalink($sss_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$sss_permalink' and permalink_dil='$sss_dil'"));
			
			if($sss_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				$query="INSERT INTO ".prefix."_sss SET 
				".implode("",$ekler)."
				sss_adi='$sss_adi',
				sss_permalink='$sss_permalink',
				sss_aciklama='$sss_aciklama',
				sss_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				sss_durum='1',
				sss_kayitzaman='".time()."',
				sss_dil='$sss_dil',
				sss_gid='$sss_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_sss WHERE sss_permalink='$sss_permalink'"));
					if($sss_gid==""){
						query("UPDATE ".prefix."_sss SET sss_gid='".$sonid["sss_id"]."' WHERE sss_id='".$sonid["sss_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["sss_id"]."', 
							permalink_link='$sss_permalink', 
							permalink_git='$sss_permalink', 
							permalink_dil='$sss_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_sss WHERE sss_id='$sss_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["sss_id"]."', 
							permalink_link='".$orj["sss_permalink"]."', 
							permalink_git='$sss_permalink', 
							permalink_dil='$sss_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_sss WHERE sss_permalink='$sss_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["sss_gid"]."&dil=".$sss_dil;
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
			$sss_id=ass(p("sss_id"));
			$sss_adi=ass(p("sss_adi"));
			$sss_permalink=ass(p("sss_permalink"));
			$sss_aciklama=ass($_POST["sss_aciklama"]);
			$sss_dil=ass(p("sss_dil"));
			$sss_gid=ass(p("sss_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($sss_permalink==""){
				$sss_permalink = permalink($sss_adi)."-".rand(1000,9999);
			}else{
				$sss_permalink = permalink($sss_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_sss WHERE sss_id='$sss_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$sss_permalink' and permalink_dil='$sss_dil'"));
			
			if($sss_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["sss_permalink"]!=$sss_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				
				$query="UPDATE ".prefix."_sss SET 
				".implode("",$ekler)."
				sss_adi='$sss_adi',
				sss_permalink='$sss_permalink',
				sss_aciklama='$sss_aciklama'
				WHERE sss_id='$sss_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["sss_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$sss_id."', 
					permalink_link='$sss_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$sss_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$sss_permalink'
					WHERE permalink_git='$eski_permalink'");
					
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
			$oku=row(query("SELECT * FROM ".prefix."_sss WHERE sss_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["sss_durum"]==1){
					query("UPDATE ".prefix."_sss SET sss_durum='0' WHERE sss_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_sss SET sss_durum='1' WHERE sss_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_sss WHERE sss_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["sss_permalink"]."'");
				query("DELETE FROM ".prefix."_sss WHERE sss_gid='$id'");
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