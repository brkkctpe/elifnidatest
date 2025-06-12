<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "oduller";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$oduller_adi=ass(p("oduller_adi"));
			$oduller_permalink=ass(p("oduller_permalink"));
			$oduller_desc=ass(p("oduller_desc"));
			$oduller_keyw=ass(p("oduller_keyw"));
			$oduller_resimortam=ass(p("oduller_resimortam"));
			$oduller_aciklama=ass($_POST["oduller_aciklama"]);
			$oduller_dil=ass(p("oduller_dil"));
			$oduller_gid=ass(p("oduller_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($oduller_permalink==""){
				$oduller_permalink = permalink($oduller_adi)."-".rand(1000,9999);
			}else{
				$oduller_permalink = permalink($oduller_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$oduller_permalink' and permalink_dil='$oduller_dil'"));
			
			if($oduller_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["oduller_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["oduller_resim"]["tmp_name"];
					$resim 		 = $_FILES["oduller_resim"]["name"];
					$rtipi		 = $_FILES["oduller_resim"]["type"];
					$rboyut		 = $_FILES["oduller_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$oduller_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("oduller_resimortam")!=""){
					$oduller_resim = $oduller_resimortam;	
				}
				$query="INSERT INTO ".prefix."_oduller SET 
				".implode("",$ekler)."
				oduller_adi='$oduller_adi',
				oduller_permalink='$oduller_permalink',
				oduller_desc='$oduller_desc',
				oduller_keyw='$oduller_keyw',
				oduller_resim='$oduller_resim',
				oduller_aciklama='$oduller_aciklama',
				oduller_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				oduller_durum='1',
				oduller_kayitzaman='".time()."',
				oduller_dil='$oduller_dil',
				oduller_gid='$oduller_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_oduller WHERE oduller_permalink='$oduller_permalink'"));
					if($oduller_gid==""){
						query("UPDATE ".prefix."_oduller SET oduller_gid='".$sonid["oduller_id"]."' WHERE oduller_id='".$sonid["oduller_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["oduller_id"]."', 
							permalink_link='$oduller_permalink', 
							permalink_git='$oduller_permalink', 
							permalink_dil='$oduller_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_oduller WHERE oduller_id='$oduller_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["oduller_id"]."', 
							permalink_link='".$orj["oduller_permalink"]."', 
							permalink_git='$oduller_permalink', 
							permalink_dil='$oduller_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_oduller WHERE oduller_permalink='$oduller_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["oduller_gid"]."&dil=".$oduller_dil;
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
			$oduller_id=ass(p("oduller_id"));
			$oduller_adi=ass(p("oduller_adi"));
			$oduller_permalink=ass(p("oduller_permalink"));
			$oduller_desc=ass(p("oduller_desc"));
			$oduller_keyw=ass(p("oduller_keyw"));
			$oduller_resimortam=ass(p("oduller_resimortam"));
			$oduller_aciklama=ass($_POST["oduller_aciklama"]);
			$oduller_dil=ass(p("oduller_dil"));
			$oduller_gid=ass(p("oduller_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($oduller_permalink==""){
				$oduller_permalink = permalink($oduller_adi)."-".rand(1000,9999);
			}else{
				$oduller_permalink = permalink($oduller_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_oduller WHERE oduller_id='$oduller_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$oduller_permalink' and permalink_dil='$oduller_dil'"));
			
			if($oduller_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["oduller_permalink"]!=$oduller_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["oduller_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["oduller_resim"]["tmp_name"];
					$resim 		 = $_FILES["oduller_resim"]["name"];
					$rtipi		 = $_FILES["oduller_resim"]["type"];
					$rboyut		 = $_FILES["oduller_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$oduller_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("oduller_resimortam")!=""){
					$oduller_resim = $oduller_resimortam;	
				}
				
				$query="UPDATE ".prefix."_oduller SET 
				".implode("",$ekler)."
				oduller_adi='$oduller_adi',
				oduller_permalink='$oduller_permalink',
				oduller_desc='$oduller_desc',
				oduller_keyw='$oduller_keyw',
				oduller_resim='$oduller_resim',
				oduller_aciklama='$oduller_aciklama'
				WHERE oduller_id='$oduller_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["oduller_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$oduller_id."', 
					permalink_link='$oduller_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$oduller_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$oduller_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_oduller WHERE oduller_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["oduller_durum"]==1){
					query("UPDATE ".prefix."_oduller SET oduller_durum='0' WHERE oduller_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_oduller SET oduller_durum='1' WHERE oduller_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_oduller WHERE oduller_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["oduller_permalink"]."'");
				query("DELETE FROM ".prefix."_oduller WHERE oduller_gid='$id'");
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