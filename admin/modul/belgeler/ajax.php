<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "belgeler";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$belgeler_adi=ass(p("belgeler_adi"));
			$belgeler_permalink=ass(p("belgeler_permalink"));
			$belgeler_desc=ass(p("belgeler_desc"));
			$belgeler_keyw=ass(p("belgeler_keyw"));
			$belgeler_resimortam=ass(p("belgeler_resimortam"));
			$belgeler_belgeortam=ass(p("belgeler_belgeortam"));
			$belgeler_aciklama=ass($_POST["belgeler_aciklama"]);
			$belgeler_dil=ass(p("belgeler_dil"));
			$belgeler_gid=ass(p("belgeler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($belgeler_permalink==""){
				$belgeler_permalink = permalink($belgeler_adi)."-".rand(1000,9999);
			}else{
				$belgeler_permalink = permalink($belgeler_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$belgeler_permalink' and permalink_dil='$belgeler_dil'"));
			
			if($belgeler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["belgeler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["belgeler_resim"]["tmp_name"];
					$resim 		 = $_FILES["belgeler_resim"]["name"];
					$rtipi		 = $_FILES["belgeler_resim"]["type"];
					$rboyut		 = $_FILES["belgeler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$belgeler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("belgeler_resimortam")!=""){
					$belgeler_resim = $belgeler_resimortam;	
				}
				if($_FILES["belgeler_belge"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["belgeler_belge"]["tmp_name"];
					$resim 		 = $_FILES["belgeler_belge"]["name"];
					$rtipi		 = $_FILES["belgeler_belge"]["type"];
					$rboyut		 = $_FILES["belgeler_belge"]["size"];
					$hedef 		 = "../../app/File";
					$belgeler_belge=dosyayukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("belgeler_belgeortam")!=""){
					$belgeler_belge = $belgeler_belgeortam;	
				}
				$query="INSERT INTO ".prefix."_belgeler SET 
				".implode("",$ekler)."
				belgeler_adi='$belgeler_adi',
				belgeler_permalink='$belgeler_permalink',
				belgeler_desc='$belgeler_desc',
				belgeler_keyw='$belgeler_keyw',
				belgeler_resim='$belgeler_resim',
				belgeler_belge='$belgeler_belge',
				belgeler_aciklama='$belgeler_aciklama',
				belgeler_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				belgeler_durum='1',
				belgeler_kayitzaman='".time()."',
				belgeler_dil='$belgeler_dil',
				belgeler_gid='$belgeler_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_belgeler WHERE belgeler_permalink='$belgeler_permalink'"));
					if($belgeler_gid==""){
						query("UPDATE ".prefix."_belgeler SET belgeler_gid='".$sonid["belgeler_id"]."' WHERE belgeler_id='".$sonid["belgeler_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["belgeler_id"]."', 
							permalink_link='$belgeler_permalink', 
							permalink_git='$belgeler_permalink', 
							permalink_dil='$belgeler_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_belgeler WHERE belgeler_id='$belgeler_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["belgeler_id"]."', 
							permalink_link='".$orj["belgeler_permalink"]."', 
							permalink_git='$belgeler_permalink', 
							permalink_dil='$belgeler_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_belgeler WHERE belgeler_permalink='$belgeler_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["belgeler_gid"]."&dil=".$belgeler_dil;
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
			$belgeler_id=ass(p("belgeler_id"));
			$belgeler_adi=ass(p("belgeler_adi"));
			$belgeler_permalink=ass(p("belgeler_permalink"));
			$belgeler_desc=ass(p("belgeler_desc"));
			$belgeler_keyw=ass(p("belgeler_keyw"));
			$belgeler_resimortam=ass(p("belgeler_resimortam"));
			$belgeler_belgeortam=ass(p("belgeler_belgeortam"));
			$belgeler_aciklama=ass($_POST["belgeler_aciklama"]);
			$belgeler_dil=ass(p("belgeler_dil"));
			$belgeler_gid=ass(p("belgeler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($belgeler_permalink==""){
				$belgeler_permalink = permalink($belgeler_adi)."-".rand(1000,9999);
			}else{
				$belgeler_permalink = permalink($belgeler_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_belgeler WHERE belgeler_id='$belgeler_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$belgeler_permalink' and permalink_dil='$belgeler_dil'"));
			
			if($belgeler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["belgeler_permalink"]!=$belgeler_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["belgeler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["belgeler_resim"]["tmp_name"];
					$resim 		 = $_FILES["belgeler_resim"]["name"];
					$rtipi		 = $_FILES["belgeler_resim"]["type"];
					$rboyut		 = $_FILES["belgeler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$belgeler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("belgeler_resimortam")!=""){
					$belgeler_resim = $belgeler_resimortam;	
				}
				if($_FILES["belgeler_belge"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["belgeler_belge"]["tmp_name"];
					$resim 		 = $_FILES["belgeler_belge"]["name"];
					$rtipi		 = $_FILES["belgeler_belge"]["type"];
					$rboyut		 = $_FILES["belgeler_belge"]["size"];
					$hedef 		 = "../../app/File";
					$belgeler_belge=dosyayukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("belgeler_belgeortam")!=""){
					$belgeler_belge = $belgeler_belgeortam;	
				}
				
				$query="UPDATE ".prefix."_belgeler SET 
				".implode("",$ekler)."
				belgeler_adi='$belgeler_adi',
				belgeler_permalink='$belgeler_permalink',
				belgeler_desc='$belgeler_desc',
				belgeler_keyw='$belgeler_keyw',
				belgeler_resim='$belgeler_resim',
				belgeler_belge='$belgeler_belge',
				belgeler_aciklama='$belgeler_aciklama'
				WHERE belgeler_id='$belgeler_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["belgeler_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$belgeler_id."', 
					permalink_link='$belgeler_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$belgeler_id."', 
					permalink_git='$belgeler_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_belgeler WHERE belgeler_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["belgeler_durum"]==1){
					query("UPDATE ".prefix."_belgeler SET belgeler_durum='0' WHERE belgeler_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_belgeler SET belgeler_durum='1' WHERE belgeler_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_belgeler WHERE belgeler_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["belgeler_permalink"]."'");
				query("DELETE FROM ".prefix."_belgeler WHERE belgeler_gid='$id'");
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