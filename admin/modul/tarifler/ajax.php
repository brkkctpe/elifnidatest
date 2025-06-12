<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "tarifler";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$tarifler_adi=ass(p("tarifler_adi"));
			$tarifler_permalink=ass(p("tarifler_permalink"));
			$tarifler_desc=ass(p("tarifler_desc"));
			$tarifler_keyw=ass(p("tarifler_keyw"));
			$tarifler_resimortam=ass(p("tarifler_resimortam"));
			$tarifler_aciklama=ass($_POST["tarifler_aciklama"]);
			$tarifler_dil=ass(p("tarifler_dil"));
			$tarifler_gid=ass(p("tarifler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($tarifler_permalink==""){
				$tarifler_permalink = permalink($tarifler_adi)."-".rand(1000,9999);
			}else{
				$tarifler_permalink = permalink($tarifler_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$tarifler_permalink' and permalink_dil='$tarifler_dil'"));
			
			if($tarifler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["tarifler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["tarifler_resim"]["tmp_name"];
					$resim 		 = $_FILES["tarifler_resim"]["name"];
					$rtipi		 = $_FILES["tarifler_resim"]["type"];
					$rboyut		 = $_FILES["tarifler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$tarifler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("tarifler_resimortam")!=""){
					$tarifler_resim = $tarifler_resimortam;	
				}
				$query="INSERT INTO ".prefix."_tarifler SET 
				".implode("",$ekler)."
				tarifler_adi='$tarifler_adi',
				tarifler_permalink='$tarifler_permalink',
				tarifler_desc='$tarifler_desc',
				tarifler_keyw='$tarifler_keyw',
				tarifler_resim='$tarifler_resim',
				tarifler_aciklama='$tarifler_aciklama',
				tarifler_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				tarifler_durum='1',
				tarifler_kayitzaman='".time()."',
				tarifler_dil='$tarifler_dil',
				tarifler_gid='$tarifler_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_permalink='$tarifler_permalink'"));
					if($tarifler_gid==""){
						query("UPDATE ".prefix."_tarifler SET tarifler_gid='".$sonid["tarifler_id"]."' WHERE tarifler_id='".$sonid["tarifler_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["tarifler_id"]."', 
							permalink_link='$tarifler_permalink', 
							permalink_git='$tarifler_permalink', 
							permalink_dil='$tarifler_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_id='$tarifler_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["tarifler_id"]."', 
							permalink_link='".$orj["tarifler_permalink"]."', 
							permalink_git='$tarifler_permalink', 
							permalink_dil='$tarifler_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_permalink='$tarifler_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["tarifler_gid"]."&dil=".$tarifler_dil;
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
			$tarifler_id=ass(p("tarifler_id"));
			$tarifler_adi=ass(p("tarifler_adi"));
			$tarifler_permalink=ass(p("tarifler_permalink"));
			$tarifler_desc=ass(p("tarifler_desc"));
			$tarifler_keyw=ass(p("tarifler_keyw"));
			$tarifler_resimortam=ass(p("tarifler_resimortam"));
			$tarifler_aciklama=ass($_POST["tarifler_aciklama"]);
			$tarifler_dil=ass(p("tarifler_dil"));
			$tarifler_gid=ass(p("tarifler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($tarifler_permalink==""){
				$tarifler_permalink = permalink($tarifler_adi)."-".rand(1000,9999);
			}else{
				$tarifler_permalink = permalink($tarifler_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_id='$tarifler_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$tarifler_permalink' and permalink_dil='$tarifler_dil'"));
			
			if($tarifler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["tarifler_permalink"]!=$tarifler_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["tarifler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["tarifler_resim"]["tmp_name"];
					$resim 		 = $_FILES["tarifler_resim"]["name"];
					$rtipi		 = $_FILES["tarifler_resim"]["type"];
					$rboyut		 = $_FILES["tarifler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$tarifler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("tarifler_resimortam")!=""){
					$tarifler_resim = $tarifler_resimortam;	
				}
				
				$query="UPDATE ".prefix."_tarifler SET 
				".implode("",$ekler)."
				tarifler_adi='$tarifler_adi',
				tarifler_permalink='$tarifler_permalink',
				tarifler_desc='$tarifler_desc',
				tarifler_keyw='$tarifler_keyw',
				tarifler_resim='$tarifler_resim',
				tarifler_aciklama='$tarifler_aciklama'
				WHERE tarifler_id='$tarifler_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["tarifler_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$tarifler_id."', 
					permalink_link='$tarifler_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$tarifler_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$tarifler_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["tarifler_durum"]==1){
					query("UPDATE ".prefix."_tarifler SET tarifler_durum='0' WHERE tarifler_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_tarifler SET tarifler_durum='1' WHERE tarifler_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["tarifler_permalink"]."'");
				query("DELETE FROM ".prefix."_tarifler WHERE tarifler_gid='$id'");
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