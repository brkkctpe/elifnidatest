<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "partner";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$partner_adi=ass(p("partner_adi"));
			$partner_permalink=ass(p("partner_permalink"));
			$partner_desc=ass(p("partner_desc"));
			$partner_keyw=ass(p("partner_keyw"));
			$partner_resimortam=ass(p("partner_resimortam"));
			$partner_aciklama=ass($_POST["partner_aciklama"]);
			$partner_dil=ass(p("partner_dil"));
			$partner_gid=ass(p("partner_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($partner_permalink==""){
				$partner_permalink = permalink($partner_adi)."-".rand(1000,9999);
			}else{
				$partner_permalink = permalink($partner_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$partner_permalink' and permalink_dil='$partner_dil'"));
			
			if($partner_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["partner_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["partner_resim"]["tmp_name"];
					$resim 		 = $_FILES["partner_resim"]["name"];
					$rtipi		 = $_FILES["partner_resim"]["type"];
					$rboyut		 = $_FILES["partner_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$partner_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("partner_resimortam")!=""){
					$partner_resim = $partner_resimortam;	
				}
				$query="INSERT INTO ".prefix."_partner SET 
				".implode("",$ekler)."
				partner_adi='$partner_adi',
				partner_permalink='$partner_permalink',
				partner_desc='$partner_desc',
				partner_keyw='$partner_keyw',
				partner_resim='$partner_resim',
				partner_aciklama='$partner_aciklama',
				partner_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				partner_durum='1',
				partner_kayitzaman='".time()."',
				partner_dil='$partner_dil',
				partner_gid='$partner_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_partner WHERE partner_permalink='$partner_permalink'"));
					if($partner_gid==""){
						query("UPDATE ".prefix."_partner SET partner_gid='".$sonid["partner_id"]."' WHERE partner_id='".$sonid["partner_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["partner_id"]."', 
							permalink_link='$partner_permalink', 
							permalink_git='$partner_permalink', 
							permalink_dil='$partner_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_partner WHERE partner_id='$partner_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["partner_id"]."', 
							permalink_link='".$orj["partner_permalink"]."', 
							permalink_git='$partner_permalink', 
							permalink_dil='$partner_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_partner WHERE partner_permalink='$partner_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["partner_gid"]."&dil=".$partner_dil;
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
			$partner_id=ass(p("partner_id"));
			$partner_adi=ass(p("partner_adi"));
			$partner_permalink=ass(p("partner_permalink"));
			$partner_desc=ass(p("partner_desc"));
			$partner_keyw=ass(p("partner_keyw"));
			$partner_resimortam=ass(p("partner_resimortam"));
			$partner_aciklama=ass($_POST["partner_aciklama"]);
			$partner_dil=ass(p("partner_dil"));
			$partner_gid=ass(p("partner_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($partner_permalink==""){
				$partner_permalink = permalink($partner_adi)."-".rand(1000,9999);
			}else{
				$partner_permalink = permalink($partner_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_partner WHERE partner_id='$partner_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$partner_permalink' and permalink_dil='$partner_dil'"));
			
			if($partner_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["partner_permalink"]!=$partner_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["partner_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["partner_resim"]["tmp_name"];
					$resim 		 = $_FILES["partner_resim"]["name"];
					$rtipi		 = $_FILES["partner_resim"]["type"];
					$rboyut		 = $_FILES["partner_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$partner_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("partner_resimortam")!=""){
					$partner_resim = $partner_resimortam;	
				}
				
				$query="UPDATE ".prefix."_partner SET 
				".implode("",$ekler)."
				partner_adi='$partner_adi',
				partner_permalink='$partner_permalink',
				partner_desc='$partner_desc',
				partner_keyw='$partner_keyw',
				partner_resim='$partner_resim',
				partner_aciklama='$partner_aciklama'
				WHERE partner_id='$partner_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["partner_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$partner_id."', 
					permalink_link='$partner_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$partner_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$partner_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_partner WHERE partner_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["partner_durum"]==1){
					query("UPDATE ".prefix."_partner SET partner_durum='0' WHERE partner_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_partner SET partner_durum='1' WHERE partner_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_partner WHERE partner_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["partner_permalink"]."'");
				query("DELETE FROM ".prefix."_partner WHERE partner_gid='$id'");
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