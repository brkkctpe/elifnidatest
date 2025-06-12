<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "hesap";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$hesap_adi=ass(p("hesap_adi"));
			$hesap_permalink=ass(p("hesap_permalink"));
			$hesap_desc=ass(p("hesap_desc"));
			$hesap_keyw=ass(p("hesap_keyw"));
			$hesap_resimortam=ass(p("hesap_resimortam"));
			$hesap_aciklama=ass($_POST["hesap_aciklama"]);
			$hesap_dil=ass(p("hesap_dil"));
			$hesap_gid=ass(p("hesap_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($hesap_permalink==""){
				$hesap_permalink = permalink($hesap_adi)."-".rand(1000,9999);
			}else{
				$hesap_permalink = permalink($hesap_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$hesap_permalink' and permalink_dil='$hesap_dil'"));
			
			if($hesap_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["hesap_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["hesap_resim"]["tmp_name"];
					$resim 		 = $_FILES["hesap_resim"]["name"];
					$rtipi		 = $_FILES["hesap_resim"]["type"];
					$rboyut		 = $_FILES["hesap_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$hesap_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("hesap_resimortam")!=""){
					$hesap_resim = $hesap_resimortam;	
				}
				$query="INSERT INTO ".prefix."_hesap SET 
				".implode("",$ekler)."
				hesap_adi='$hesap_adi',
				hesap_permalink='$hesap_permalink',
				hesap_desc='$hesap_desc',
				hesap_keyw='$hesap_keyw',
				hesap_resim='$hesap_resim',
				hesap_aciklama='$hesap_aciklama',
				hesap_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				hesap_durum='1',
				hesap_kayitzaman='".time()."',
				hesap_dil='$hesap_dil',
				hesap_gid='$hesap_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_permalink='$hesap_permalink'"));
					if($hesap_gid==""){
						query("UPDATE ".prefix."_hesap SET hesap_gid='".$sonid["hesap_id"]."' WHERE hesap_id='".$sonid["hesap_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["hesap_id"]."', 
							permalink_link='$hesap_permalink', 
							permalink_git='$hesap_permalink', 
							permalink_dil='$hesap_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_id='$hesap_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["hesap_id"]."', 
							permalink_link='".$orj["hesap_permalink"]."', 
							permalink_git='$hesap_permalink', 
							permalink_dil='$hesap_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_permalink='$hesap_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["hesap_gid"]."&dil=".$hesap_dil;
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
			$hesap_id=ass(p("hesap_id"));
			$hesap_adi=ass(p("hesap_adi"));
			$hesap_permalink=ass(p("hesap_permalink"));
			$hesap_desc=ass(p("hesap_desc"));
			$hesap_keyw=ass(p("hesap_keyw"));
			$hesap_resimortam=ass(p("hesap_resimortam"));
			$hesap_aciklama=ass($_POST["hesap_aciklama"]);
			$hesap_dil=ass(p("hesap_dil"));
			$hesap_gid=ass(p("hesap_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($hesap_permalink==""){
				$hesap_permalink = permalink($hesap_adi)."-".rand(1000,9999);
			}else{
				$hesap_permalink = permalink($hesap_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_id='$hesap_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$hesap_permalink' and permalink_dil='$hesap_dil'"));
			
			if($hesap_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["hesap_permalink"]!=$hesap_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["hesap_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["hesap_resim"]["tmp_name"];
					$resim 		 = $_FILES["hesap_resim"]["name"];
					$rtipi		 = $_FILES["hesap_resim"]["type"];
					$rboyut		 = $_FILES["hesap_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$hesap_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("hesap_resimortam")!=""){
					$hesap_resim = $hesap_resimortam;	
				}
				
				$query="UPDATE ".prefix."_hesap SET 
				".implode("",$ekler)."
				hesap_adi='$hesap_adi',
				hesap_permalink='$hesap_permalink',
				hesap_desc='$hesap_desc',
				hesap_keyw='$hesap_keyw',
				hesap_resim='$hesap_resim',
				hesap_aciklama='$hesap_aciklama'
				WHERE hesap_id='$hesap_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["hesap_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$hesap_id."', 
					permalink_link='$hesap_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$hesap_id."', 
					permalink_git='$hesap_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["hesap_durum"]==1){
					query("UPDATE ".prefix."_hesap SET hesap_durum='0' WHERE hesap_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_hesap SET hesap_durum='1' WHERE hesap_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["hesap_permalink"]."'");
				query("DELETE FROM ".prefix."_hesap WHERE hesap_gid='$id'");
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