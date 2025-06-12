<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "asama";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$asama_adi=ass(p("asama_adi"));
			$asama_permalink=ass(p("asama_permalink"));
			$asama_aciklama=ass($_POST["asama_aciklama"]);
			$asama_dil=ass(p("asama_dil"));
			$asama_gid=ass(p("asama_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($asama_permalink==""){
				$asama_permalink = permalink($asama_adi)."-".rand(1000,9999);
			}else{
				$asama_permalink = permalink($asama_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$asama_permalink' and permalink_dil='$asama_dil'"));
			
			if($asama_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				$query="INSERT INTO ".prefix."_asama SET 
				".implode("",$ekler)."
				asama_adi='$asama_adi',
				asama_permalink='$asama_permalink',
				asama_aciklama='$asama_aciklama',
				asama_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				asama_durum='1',
				asama_kayitzaman='".time()."',
				asama_dil='$asama_dil',
				asama_gid='$asama_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_asama WHERE asama_permalink='$asama_permalink'"));
					if($asama_gid==""){
						query("UPDATE ".prefix."_asama SET asama_gid='".$sonid["asama_id"]."' WHERE asama_id='".$sonid["asama_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["asama_id"]."', 
							permalink_link='$asama_permalink', 
							permalink_git='$asama_permalink', 
							permalink_dil='$asama_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_asama WHERE asama_id='$asama_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["asama_id"]."', 
							permalink_link='".$orj["asama_permalink"]."', 
							permalink_git='$asama_permalink', 
							permalink_dil='$asama_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_asama WHERE asama_permalink='$asama_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["asama_gid"]."&dil=".$asama_dil;
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
			$asama_id=ass(p("asama_id"));
			$asama_adi=ass(p("asama_adi"));
			$asama_permalink=ass(p("asama_permalink"));
			$asama_aciklama=ass($_POST["asama_aciklama"]);
			$asama_dil=ass(p("asama_dil"));
			$asama_gid=ass(p("asama_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($asama_permalink==""){
				$asama_permalink = permalink($asama_adi)."-".rand(1000,9999);
			}else{
				$asama_permalink = permalink($asama_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_asama WHERE asama_id='$asama_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$asama_permalink' and permalink_dil='$asama_dil'"));
			
			if($asama_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["asama_permalink"]!=$asama_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				
				$query="UPDATE ".prefix."_asama SET 
				".implode("",$ekler)."
				asama_adi='$asama_adi',
				asama_permalink='$asama_permalink',
				asama_aciklama='$asama_aciklama'
				WHERE asama_id='$asama_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["asama_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$asama_id."', 
					permalink_link='$asama_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$asama_id."', 
					permalink_git='$asama_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_asama WHERE asama_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["asama_durum"]==1){
					query("UPDATE ".prefix."_asama SET asama_durum='0' WHERE asama_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_asama SET asama_durum='1' WHERE asama_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_asama WHERE asama_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["asama_permalink"]."'");
				query("DELETE FROM ".prefix."_asama WHERE asama_gid='$id'");
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