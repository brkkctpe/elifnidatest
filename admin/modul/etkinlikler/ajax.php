<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "etkinlikler";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$etkinlikler_adi=ass(p("etkinlikler_adi"));
			$etkinlikler_permalink=ass(p("etkinlikler_permalink"));
			$etkinlikler_desc=ass(p("etkinlikler_desc"));
			$etkinlikler_keyw=ass(p("etkinlikler_keyw"));
			$etkinlikler_resimortam=ass(p("etkinlikler_resimortam"));
			$etkinlikler_aciklama=ass($_POST["etkinlikler_aciklama"]);
			$etkinlikler_dil=ass(p("etkinlikler_dil"));
			$etkinlikler_gid=ass(p("etkinlikler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($etkinlikler_permalink==""){
				$etkinlikler_permalink = permalink($etkinlikler_adi)."-".rand(1000,9999);
			}else{
				$etkinlikler_permalink = permalink($etkinlikler_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$etkinlikler_permalink' and permalink_dil='$etkinlikler_dil'"));
			
			if($etkinlikler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["etkinlikler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["etkinlikler_resim"]["tmp_name"];
					$resim 		 = $_FILES["etkinlikler_resim"]["name"];
					$rtipi		 = $_FILES["etkinlikler_resim"]["type"];
					$rboyut		 = $_FILES["etkinlikler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$etkinlikler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("etkinlikler_resimortam")!=""){
					$etkinlikler_resim = $etkinlikler_resimortam;	
				}
				$query="INSERT INTO ".prefix."_etkinlikler SET 
				".implode("",$ekler)."
				etkinlikler_adi='$etkinlikler_adi',
				etkinlikler_permalink='$etkinlikler_permalink',
				etkinlikler_desc='$etkinlikler_desc',
				etkinlikler_keyw='$etkinlikler_keyw',
				etkinlikler_resim='$etkinlikler_resim',
				etkinlikler_aciklama='$etkinlikler_aciklama',
				etkinlikler_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				etkinlikler_durum='1',
				etkinlikler_kayitzaman='".time()."',
				etkinlikler_dil='$etkinlikler_dil',
				etkinlikler_gid='$etkinlikler_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_etkinlikler WHERE etkinlikler_permalink='$etkinlikler_permalink'"));
					if($etkinlikler_gid==""){
						query("UPDATE ".prefix."_etkinlikler SET etkinlikler_gid='".$sonid["etkinlikler_id"]."' WHERE etkinlikler_id='".$sonid["etkinlikler_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["etkinlikler_id"]."', 
							permalink_link='$etkinlikler_permalink', 
							permalink_git='$etkinlikler_permalink', 
							permalink_dil='$etkinlikler_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_etkinlikler WHERE etkinlikler_id='$etkinlikler_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["etkinlikler_id"]."', 
							permalink_link='".$orj["etkinlikler_permalink"]."', 
							permalink_git='$etkinlikler_permalink', 
							permalink_dil='$etkinlikler_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_etkinlikler WHERE etkinlikler_permalink='$etkinlikler_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["etkinlikler_gid"]."&dil=".$etkinlikler_dil;
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
			$etkinlikler_id=ass(p("etkinlikler_id"));
			$etkinlikler_adi=ass(p("etkinlikler_adi"));
			$etkinlikler_permalink=ass(p("etkinlikler_permalink"));
			$etkinlikler_desc=ass(p("etkinlikler_desc"));
			$etkinlikler_keyw=ass(p("etkinlikler_keyw"));
			$etkinlikler_resimortam=ass(p("etkinlikler_resimortam"));
			$etkinlikler_aciklama=ass($_POST["etkinlikler_aciklama"]);
			$etkinlikler_dil=ass(p("etkinlikler_dil"));
			$etkinlikler_gid=ass(p("etkinlikler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($etkinlikler_permalink==""){
				$etkinlikler_permalink = permalink($etkinlikler_adi)."-".rand(1000,9999);
			}else{
				$etkinlikler_permalink = permalink($etkinlikler_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_etkinlikler WHERE etkinlikler_id='$etkinlikler_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$etkinlikler_permalink' and permalink_dil='$etkinlikler_dil'"));
			
			if($etkinlikler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["etkinlikler_permalink"]!=$etkinlikler_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["etkinlikler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["etkinlikler_resim"]["tmp_name"];
					$resim 		 = $_FILES["etkinlikler_resim"]["name"];
					$rtipi		 = $_FILES["etkinlikler_resim"]["type"];
					$rboyut		 = $_FILES["etkinlikler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$etkinlikler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("etkinlikler_resimortam")!=""){
					$etkinlikler_resim = $etkinlikler_resimortam;	
				}
				
				$query="UPDATE ".prefix."_etkinlikler SET 
				".implode("",$ekler)."
				etkinlikler_adi='$etkinlikler_adi',
				etkinlikler_permalink='$etkinlikler_permalink',
				etkinlikler_desc='$etkinlikler_desc',
				etkinlikler_keyw='$etkinlikler_keyw',
				etkinlikler_resim='$etkinlikler_resim',
				etkinlikler_aciklama='$etkinlikler_aciklama'
				WHERE etkinlikler_id='$etkinlikler_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["etkinlikler_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$etkinlikler_id."', 
					permalink_link='$etkinlikler_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$etkinlikler_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$etkinlikler_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_etkinlikler WHERE etkinlikler_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["etkinlikler_durum"]==1){
					query("UPDATE ".prefix."_etkinlikler SET etkinlikler_durum='0' WHERE etkinlikler_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_etkinlikler SET etkinlikler_durum='1' WHERE etkinlikler_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_etkinlikler WHERE etkinlikler_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["etkinlikler_permalink"]."'");
				query("DELETE FROM ".prefix."_etkinlikler WHERE etkinlikler_gid='$id'");
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