<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "markalar";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$markalar_adi=ass(p("markalar_adi"));
			$markalar_permalink=ass(p("markalar_permalink"));
			$markalar_desc=ass(p("markalar_desc"));
			$markalar_keyw=ass(p("markalar_keyw"));
			$markalar_resimortam=ass(p("markalar_resimortam"));
			$markalar_aciklama=ass($_POST["markalar_aciklama"]);
			$markalar_dil=ass(p("markalar_dil"));
			$markalar_gid=ass(p("markalar_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($markalar_permalink==""){
				$markalar_permalink = permalink($markalar_adi)."-".rand(1000,9999);
			}else{
				$markalar_permalink = permalink($markalar_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$markalar_permalink' and permalink_dil='$markalar_dil'"));
			
			if($markalar_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["markalar_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["markalar_resim"]["tmp_name"];
					$resim 		 = $_FILES["markalar_resim"]["name"];
					$rtipi		 = $_FILES["markalar_resim"]["type"];
					$rboyut		 = $_FILES["markalar_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$markalar_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("markalar_resimortam")!=""){
					$markalar_resim = $markalar_resimortam;	
				}
				$query="INSERT INTO ".prefix."_markalar SET 
				".implode("",$ekler)."
				markalar_adi='$markalar_adi',
				markalar_permalink='$markalar_permalink',
				markalar_desc='$markalar_desc',
				markalar_keyw='$markalar_keyw',
				markalar_resim='$markalar_resim',
				markalar_aciklama='$markalar_aciklama',
				markalar_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				markalar_durum='1',
				markalar_kayitzaman='".time()."',
				markalar_dil='$markalar_dil',
				markalar_gid='$markalar_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_markalar WHERE markalar_permalink='$markalar_permalink'"));
					if($markalar_gid==""){
						query("UPDATE ".prefix."_markalar SET markalar_gid='".$sonid["markalar_id"]."' WHERE markalar_id='".$sonid["markalar_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["markalar_id"]."', 
							permalink_link='$markalar_permalink', 
							permalink_git='$markalar_permalink', 
							permalink_dil='$markalar_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_markalar WHERE markalar_id='$markalar_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["markalar_id"]."', 
							permalink_link='".$orj["markalar_permalink"]."', 
							permalink_git='$markalar_permalink', 
							permalink_dil='$markalar_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_markalar WHERE markalar_permalink='$markalar_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["markalar_gid"]."&dil=".$markalar_dil;
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
			$markalar_id=ass(p("markalar_id"));
			$markalar_adi=ass(p("markalar_adi"));
			$markalar_permalink=ass(p("markalar_permalink"));
			$markalar_desc=ass(p("markalar_desc"));
			$markalar_keyw=ass(p("markalar_keyw"));
			$markalar_resimortam=ass(p("markalar_resimortam"));
			$markalar_aciklama=ass($_POST["markalar_aciklama"]);
			$markalar_dil=ass(p("markalar_dil"));
			$markalar_gid=ass(p("markalar_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($markalar_permalink==""){
				$markalar_permalink = permalink($markalar_adi)."-".rand(1000,9999);
			}else{
				$markalar_permalink = permalink($markalar_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_markalar WHERE markalar_id='$markalar_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$markalar_permalink' and permalink_dil='$markalar_dil'"));
			
			if($markalar_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["markalar_permalink"]!=$markalar_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["markalar_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["markalar_resim"]["tmp_name"];
					$resim 		 = $_FILES["markalar_resim"]["name"];
					$rtipi		 = $_FILES["markalar_resim"]["type"];
					$rboyut		 = $_FILES["markalar_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$markalar_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("markalar_resimortam")!=""){
					$markalar_resim = $markalar_resimortam;	
				}
				
				$query="UPDATE ".prefix."_markalar SET 
				".implode("",$ekler)."
				markalar_adi='$markalar_adi',
				markalar_permalink='$markalar_permalink',
				markalar_desc='$markalar_desc',
				markalar_keyw='$markalar_keyw',
				markalar_resim='$markalar_resim',
				markalar_aciklama='$markalar_aciklama'
				WHERE markalar_id='$markalar_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["markalar_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$markalar_id."', 
					permalink_link='$markalar_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$markalar_id."', 
					permalink_git='$markalar_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_markalar WHERE markalar_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["markalar_durum"]==1){
					query("UPDATE ".prefix."_markalar SET markalar_durum='0' WHERE markalar_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_markalar SET markalar_durum='1' WHERE markalar_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_markalar WHERE markalar_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["markalar_permalink"]."'");
				query("DELETE FROM ".prefix."_markalar WHERE markalar_gid='$id'");
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