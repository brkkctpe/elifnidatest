<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "videokategori";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$videokategori_adi=ass(p("videokategori_adi"));
			$videokategori_permalink=ass(p("videokategori_permalink"));
			$videokategori_desc=ass(p("videokategori_desc"));
			$videokategori_keyw=ass(p("videokategori_keyw"));
			$videokategori_resimortam=ass(p("videokategori_resimortam"));
			$videokategori_aciklama=ass($_POST["videokategori_aciklama"]);
			$videokategori_dil=ass(p("videokategori_dil"));
			$videokategori_gid=ass(p("videokategori_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($videokategori_permalink==""){
				$videokategori_permalink = permalink($videokategori_adi)."-".rand(1000,9999);
			}else{
				$videokategori_permalink = permalink($videokategori_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$videokategori_permalink' and permalink_dil='$videokategori_dil'"));
			
			if($videokategori_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["videokategori_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["videokategori_resim"]["tmp_name"];
					$resim 		 = $_FILES["videokategori_resim"]["name"];
					$rtipi		 = $_FILES["videokategori_resim"]["type"];
					$rboyut		 = $_FILES["videokategori_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$videokategori_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("videokategori_resimortam")!=""){
					$videokategori_resim = $videokategori_resimortam;	
				}
				$query="INSERT INTO ".prefix."_videokategori SET 
				".implode("",$ekler)."
				videokategori_adi='$videokategori_adi',
				videokategori_permalink='$videokategori_permalink',
				videokategori_desc='$videokategori_desc',
				videokategori_keyw='$videokategori_keyw',
				videokategori_resim='$videokategori_resim',
				videokategori_aciklama='$videokategori_aciklama',
				videokategori_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				videokategori_durum='1',
				videokategori_kayitzaman='".time()."',
				videokategori_dil='$videokategori_dil',
				videokategori_gid='$videokategori_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_videokategori WHERE videokategori_permalink='$videokategori_permalink'"));
					if($videokategori_gid==""){
						query("UPDATE ".prefix."_videokategori SET videokategori_gid='".$sonid["videokategori_id"]."' WHERE videokategori_id='".$sonid["videokategori_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["videokategori_id"]."', 
							permalink_link='$videokategori_permalink', 
							permalink_git='$videokategori_permalink', 
							permalink_dil='$videokategori_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_videokategori WHERE videokategori_id='$videokategori_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["videokategori_id"]."', 
							permalink_link='".$orj["videokategori_permalink"]."', 
							permalink_git='$videokategori_permalink', 
							permalink_dil='$videokategori_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_videokategori WHERE videokategori_permalink='$videokategori_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["videokategori_gid"]."&dil=".$videokategori_dil;
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
			$videokategori_id=ass(p("videokategori_id"));
			$videokategori_adi=ass(p("videokategori_adi"));
			$videokategori_permalink=ass(p("videokategori_permalink"));
			$videokategori_desc=ass(p("videokategori_desc"));
			$videokategori_keyw=ass(p("videokategori_keyw"));
			$videokategori_resimortam=ass(p("videokategori_resimortam"));
			$videokategori_aciklama=ass($_POST["videokategori_aciklama"]);
			$videokategori_dil=ass(p("videokategori_dil"));
			$videokategori_gid=ass(p("videokategori_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($videokategori_permalink==""){
				$videokategori_permalink = permalink($videokategori_adi)."-".rand(1000,9999);
			}else{
				$videokategori_permalink = permalink($videokategori_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_videokategori WHERE videokategori_id='$videokategori_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$videokategori_permalink' and permalink_dil='$videokategori_dil'"));
			
			if($videokategori_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["videokategori_permalink"]!=$videokategori_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["videokategori_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["videokategori_resim"]["tmp_name"];
					$resim 		 = $_FILES["videokategori_resim"]["name"];
					$rtipi		 = $_FILES["videokategori_resim"]["type"];
					$rboyut		 = $_FILES["videokategori_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$videokategori_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("videokategori_resimortam")!=""){
					$videokategori_resim = $videokategori_resimortam;	
				}
				
				$query="UPDATE ".prefix."_videokategori SET 
				".implode("",$ekler)."
				videokategori_adi='$videokategori_adi',
				videokategori_permalink='$videokategori_permalink',
				videokategori_desc='$videokategori_desc',
				videokategori_keyw='$videokategori_keyw',
				videokategori_resim='$videokategori_resim',
				videokategori_aciklama='$videokategori_aciklama'
				WHERE videokategori_id='$videokategori_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["videokategori_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$videokategori_id."', 
					permalink_link='$videokategori_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$videokategori_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$videokategori_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_videokategori WHERE videokategori_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["videokategori_durum"]==1){
					query("UPDATE ".prefix."_videokategori SET videokategori_durum='0' WHERE videokategori_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_videokategori SET videokategori_durum='1' WHERE videokategori_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_videokategori WHERE videokategori_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["videokategori_permalink"]."'");
				query("DELETE FROM ".prefix."_videokategori WHERE videokategori_gid='$id'");
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