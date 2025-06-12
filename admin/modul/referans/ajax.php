<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "referans";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$referans_adi=ass(p("referans_adi"));
			$referans_permalink=ass(p("referans_permalink"));
			$referans_desc=ass(p("referans_desc"));
			$referans_keyw=ass(p("referans_keyw"));
			$referans_resimortam=ass(p("referans_resimortam"));
			$referans_aciklama=ass($_POST["referans_aciklama"]);
			$referans_dil=ass(p("referans_dil"));
			$referans_gid=ass(p("referans_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($referans_permalink==""){
				$referans_permalink = permalink($referans_adi)."-".rand(1000,9999);
			}else{
				$referans_permalink = permalink($referans_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$referans_permalink' and permalink_dil='$referans_dil'"));
			
			if($referans_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["referans_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["referans_resim"]["tmp_name"];
					$resim 		 = $_FILES["referans_resim"]["name"];
					$rtipi		 = $_FILES["referans_resim"]["type"];
					$rboyut		 = $_FILES["referans_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$referans_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("referans_resimortam")!=""){
					$referans_resim = $referans_resimortam;	
				}
				$query="INSERT INTO ".prefix."_referans SET 
				".implode("",$ekler)."
				referans_adi='$referans_adi',
				referans_permalink='$referans_permalink',
				referans_desc='$referans_desc',
				referans_keyw='$referans_keyw',
				referans_resim='$referans_resim',
				referans_aciklama='$referans_aciklama',
				referans_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				referans_durum='1',
				referans_kayitzaman='".time()."',
				referans_dil='$referans_dil',
				referans_gid='$referans_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_referans WHERE referans_permalink='$referans_permalink'"));
					if($referans_gid==""){
						query("UPDATE ".prefix."_referans SET referans_gid='".$sonid["referans_id"]."' WHERE referans_id='".$sonid["referans_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["referans_id"]."', 
							permalink_link='$referans_permalink', 
							permalink_git='$referans_permalink', 
							permalink_dil='$referans_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_referans WHERE referans_id='$referans_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["referans_id"]."', 
							permalink_link='".$orj["referans_permalink"]."', 
							permalink_git='$referans_permalink', 
							permalink_dil='$referans_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_referans WHERE referans_permalink='$referans_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["referans_gid"]."&dil=".$referans_dil;
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
			$referans_id=ass(p("referans_id"));
			$referans_adi=ass(p("referans_adi"));
			$referans_permalink=ass(p("referans_permalink"));
			$referans_desc=ass(p("referans_desc"));
			$referans_keyw=ass(p("referans_keyw"));
			$referans_resimortam=ass(p("referans_resimortam"));
			$referans_aciklama=ass($_POST["referans_aciklama"]);
			$referans_dil=ass(p("referans_dil"));
			$referans_gid=ass(p("referans_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($referans_permalink==""){
				$referans_permalink = permalink($referans_adi)."-".rand(1000,9999);
			}else{
				$referans_permalink = permalink($referans_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_referans WHERE referans_id='$referans_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$referans_permalink' and permalink_dil='$referans_dil'"));
			
			if($referans_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["referans_permalink"]!=$referans_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["referans_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["referans_resim"]["tmp_name"];
					$resim 		 = $_FILES["referans_resim"]["name"];
					$rtipi		 = $_FILES["referans_resim"]["type"];
					$rboyut		 = $_FILES["referans_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$referans_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("referans_resimortam")!=""){
					$referans_resim = $referans_resimortam;	
				}
				
				$query="UPDATE ".prefix."_referans SET 
				".implode("",$ekler)."
				referans_adi='$referans_adi',
				referans_permalink='$referans_permalink',
				referans_desc='$referans_desc',
				referans_keyw='$referans_keyw',
				referans_resim='$referans_resim',
				referans_aciklama='$referans_aciklama'
				WHERE referans_id='$referans_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["referans_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$referans_id."', 
					permalink_link='$referans_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$referans_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$referans_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_referans WHERE referans_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["referans_durum"]==1){
					query("UPDATE ".prefix."_referans SET referans_durum='0' WHERE referans_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_referans SET referans_durum='1' WHERE referans_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_referans WHERE referans_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["referans_permalink"]."'");
				query("DELETE FROM ".prefix."_referans WHERE referans_gid='$id'");
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