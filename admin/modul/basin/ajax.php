<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "basin";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$basin_adi=ass(p("basin_adi"));
			$basin_permalink=ass(p("basin_permalink"));
			$basin_desc=ass(p("basin_desc"));
			$basin_keyw=ass(p("basin_keyw"));
			$basin_tur=ass(p("basin_tur"));
			$basin_video=ass(p("basin_video"));
			$basin_resimortam=ass(p("basin_resimortam"));
			$basin_aciklama=ass($_POST["basin_aciklama"]);
			$basin_dil=ass(p("basin_dil"));
			$basin_gid=ass(p("basin_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($basin_permalink==""){
				$basin_permalink = permalink($basin_adi)."-".rand(1000,9999);
			}else{
				$basin_permalink = permalink($basin_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$basin_permalink' and permalink_dil='$basin_dil'"));
			
			if($basin_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["basin_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["basin_resim"]["tmp_name"];
					$resim 		 = $_FILES["basin_resim"]["name"];
					$rtipi		 = $_FILES["basin_resim"]["type"];
					$rboyut		 = $_FILES["basin_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$basin_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("basin_resimortam")!=""){
					$basin_resim = $basin_resimortam;	
				}
				$query="INSERT INTO ".prefix."_basin SET 
				".implode("",$ekler)."
				basin_adi='$basin_adi',
				basin_permalink='$basin_permalink',
				basin_desc='$basin_desc',
				basin_keyw='$basin_keyw',
				basin_tur='$basin_tur',
				basin_video='$basin_video',
				basin_resim='$basin_resim',
				basin_aciklama='$basin_aciklama',
				basin_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				basin_durum='1',
				basin_kayitzaman='".time()."',
				basin_dil='$basin_dil',
				basin_gid='$basin_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_basin WHERE basin_permalink='$basin_permalink'"));
					if($basin_gid==""){
						query("UPDATE ".prefix."_basin SET basin_gid='".$sonid["basin_id"]."' WHERE basin_id='".$sonid["basin_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["basin_id"]."', 
							permalink_link='$basin_permalink', 
							permalink_git='$basin_permalink', 
							permalink_dil='$basin_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_basin WHERE basin_id='$basin_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["basin_id"]."', 
							permalink_link='".$orj["basin_permalink"]."', 
							permalink_git='$basin_permalink', 
							permalink_dil='$basin_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_basin WHERE basin_permalink='$basin_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["basin_gid"]."&dil=".$basin_dil;
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
			$basin_id=ass(p("basin_id"));
			$basin_adi=ass(p("basin_adi"));
			$basin_permalink=ass(p("basin_permalink"));
			$basin_desc=ass(p("basin_desc"));
			$basin_keyw=ass(p("basin_keyw"));
			$basin_tur=ass(p("basin_tur"));
			$basin_video=ass(p("basin_video"));
			$basin_resimortam=ass(p("basin_resimortam"));
			$basin_aciklama=ass($_POST["basin_aciklama"]);
			$basin_dil=ass(p("basin_dil"));
			$basin_gid=ass(p("basin_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($basin_permalink==""){
				$basin_permalink = permalink($basin_adi)."-".rand(1000,9999);
			}else{
				$basin_permalink = permalink($basin_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_basin WHERE basin_id='$basin_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$basin_permalink' and permalink_dil='$basin_dil'"));
			
			if($basin_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["basin_permalink"]!=$basin_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["basin_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["basin_resim"]["tmp_name"];
					$resim 		 = $_FILES["basin_resim"]["name"];
					$rtipi		 = $_FILES["basin_resim"]["type"];
					$rboyut		 = $_FILES["basin_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$basin_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("basin_resimortam")!=""){
					$basin_resim = $basin_resimortam;	
				}
				
				$query="UPDATE ".prefix."_basin SET 
				".implode("",$ekler)."
				basin_adi='$basin_adi',
				basin_permalink='$basin_permalink',
				basin_desc='$basin_desc',
				basin_keyw='$basin_keyw',
				basin_tur='$basin_tur',
				basin_video='$basin_video',
				basin_resim='$basin_resim',
				basin_aciklama='$basin_aciklama'
				WHERE basin_id='$basin_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["basin_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$basin_id."', 
					permalink_link='$basin_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$basin_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$basin_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_basin WHERE basin_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["basin_durum"]==1){
					query("UPDATE ".prefix."_basin SET basin_durum='0' WHERE basin_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_basin SET basin_durum='1' WHERE basin_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_basin WHERE basin_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["basin_permalink"]."'");
				query("DELETE FROM ".prefix."_basin WHERE basin_gid='$id'");
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