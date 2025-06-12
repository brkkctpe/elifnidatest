<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "hizmetler";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$hizmetler_adi=ass(p("hizmetler_adi"));
			$hizmetler_permalink=ass(p("hizmetler_permalink"));
			$hizmetler_desc=ass(p("hizmetler_desc"));
			$hizmetler_keyw=ass(p("hizmetler_keyw"));
			$hizmetler_resimortam=ass(p("hizmetler_resimortam"));
			$hizmetler_aciklama=ass($_POST["hizmetler_aciklama"]);
			$hizmetler_dil=ass(p("hizmetler_dil"));
			$hizmetler_gid=ass(p("hizmetler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($hizmetler_permalink==""){
				$hizmetler_permalink = permalink($hizmetler_adi)."-".rand(1000,9999);
			}else{
				$hizmetler_permalink = permalink($hizmetler_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$hizmetler_permalink' and permalink_dil='$hizmetler_dil'"));
			
			if($hizmetler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["hizmetler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["hizmetler_resim"]["tmp_name"];
					$resim 		 = $_FILES["hizmetler_resim"]["name"];
					$rtipi		 = $_FILES["hizmetler_resim"]["type"];
					$rboyut		 = $_FILES["hizmetler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$hizmetler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("hizmetler_resimortam")!=""){
					$hizmetler_resim = $hizmetler_resimortam;	
				}
				$query="INSERT INTO ".prefix."_hizmetler SET 
				".implode("",$ekler)."
				hizmetler_adi='$hizmetler_adi',
				hizmetler_permalink='$hizmetler_permalink',
				hizmetler_desc='$hizmetler_desc',
				hizmetler_keyw='$hizmetler_keyw',
				hizmetler_resim='$hizmetler_resim',
				hizmetler_aciklama='$hizmetler_aciklama',
				hizmetler_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				hizmetler_durum='1',
				hizmetler_kayitzaman='".time()."',
				hizmetler_dil='$hizmetler_dil',
				hizmetler_gid='$hizmetler_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_hizmetler WHERE hizmetler_permalink='$hizmetler_permalink'"));
					if($hizmetler_gid==""){
						query("UPDATE ".prefix."_hizmetler SET hizmetler_gid='".$sonid["hizmetler_id"]."' WHERE hizmetler_id='".$sonid["hizmetler_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["hizmetler_id"]."', 
							permalink_link='$hizmetler_permalink', 
							permalink_git='$hizmetler_permalink', 
							permalink_dil='$hizmetler_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_hizmetler WHERE hizmetler_id='$hizmetler_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["hizmetler_id"]."', 
							permalink_link='".$orj["hizmetler_permalink"]."', 
							permalink_git='$hizmetler_permalink', 
							permalink_dil='$hizmetler_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_hizmetler WHERE hizmetler_permalink='$hizmetler_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["hizmetler_gid"]."&dil=".$hizmetler_dil;
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
			$hizmetler_id=ass(p("hizmetler_id"));
			$hizmetler_adi=ass(p("hizmetler_adi"));
			$hizmetler_permalink=ass(p("hizmetler_permalink"));
			$hizmetler_desc=ass(p("hizmetler_desc"));
			$hizmetler_keyw=ass(p("hizmetler_keyw"));
			$hizmetler_resimortam=ass(p("hizmetler_resimortam"));
			$hizmetler_aciklama=ass($_POST["hizmetler_aciklama"]);
			$hizmetler_dil=ass(p("hizmetler_dil"));
			$hizmetler_gid=ass(p("hizmetler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($hizmetler_permalink==""){
				$hizmetler_permalink = permalink($hizmetler_adi)."-".rand(1000,9999);
			}else{
				$hizmetler_permalink = permalink($hizmetler_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_hizmetler WHERE hizmetler_id='$hizmetler_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$hizmetler_permalink' and permalink_dil='$hizmetler_dil'"));
			
			if($hizmetler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["hizmetler_permalink"]!=$hizmetler_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["hizmetler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["hizmetler_resim"]["tmp_name"];
					$resim 		 = $_FILES["hizmetler_resim"]["name"];
					$rtipi		 = $_FILES["hizmetler_resim"]["type"];
					$rboyut		 = $_FILES["hizmetler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$hizmetler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("hizmetler_resimortam")!=""){
					$hizmetler_resim = $hizmetler_resimortam;	
				}
				
				$query="UPDATE ".prefix."_hizmetler SET 
				".implode("",$ekler)."
				hizmetler_adi='$hizmetler_adi',
				hizmetler_permalink='$hizmetler_permalink',
				hizmetler_desc='$hizmetler_desc',
				hizmetler_keyw='$hizmetler_keyw',
				hizmetler_resim='$hizmetler_resim',
				hizmetler_aciklama='$hizmetler_aciklama'
				WHERE hizmetler_id='$hizmetler_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["hizmetler_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$hizmetler_id."', 
					permalink_link='$hizmetler_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$hizmetler_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$hizmetler_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_hizmetler WHERE hizmetler_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["hizmetler_durum"]==1){
					query("UPDATE ".prefix."_hizmetler SET hizmetler_durum='0' WHERE hizmetler_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_hizmetler SET hizmetler_durum='1' WHERE hizmetler_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_hizmetler WHERE hizmetler_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["hizmetler_permalink"]."'");
				query("DELETE FROM ".prefix."_hizmetler WHERE hizmetler_gid='$id'");
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