<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "yetkilisatici";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$yetkilisatici_adi=ass(p("yetkilisatici_adi"));
			$yetkilisatici_permalink=ass(p("yetkilisatici_permalink"));
			$yetkilisatici_desc=ass(p("yetkilisatici_desc"));
			$yetkilisatici_keyw=ass(p("yetkilisatici_keyw"));
			
			$yetkilisatici_tur=ass(p("yetkilisatici_tur"));
			$yetkilisatici_adres=ass(p("yetkilisatici_adres"));
			$yetkilisatici_telefon=ass(p("yetkilisatici_telefon"));
			$yetkilisatici_gsm=ass(p("yetkilisatici_gsm"));
			$yetkilisatici_il=ass(p("yetkilisatici_il"));
			$yetkilisatici_ilce=ass(p("yetkilisatici_ilce"));
			$yetkilisatici_websitesi=ass(p("yetkilisatici_websitesi"));
			$yetkilisatici_maplink=ass(p("yetkilisatici_maplink"));
			
			$yetkilisatici_resimortam=ass(p("yetkilisatici_resimortam"));
			$yetkilisatici_aciklama=ass($_POST["yetkilisatici_aciklama"]);
			$yetkilisatici_dil=ass(p("yetkilisatici_dil"));
			$yetkilisatici_gid=ass(p("yetkilisatici_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($yetkilisatici_permalink==""){
				$yetkilisatici_permalink = permalink($yetkilisatici_adi)."-".rand(1000,9999);
			}else{
				$yetkilisatici_permalink = permalink($yetkilisatici_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$yetkilisatici_permalink' and permalink_dil='$yetkilisatici_dil'"));
			
			if($yetkilisatici_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["yetkilisatici_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["yetkilisatici_resim"]["tmp_name"];
					$resim 		 = $_FILES["yetkilisatici_resim"]["name"];
					$rtipi		 = $_FILES["yetkilisatici_resim"]["type"];
					$rboyut		 = $_FILES["yetkilisatici_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$yetkilisatici_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("yetkilisatici_resimortam")!=""){
					$yetkilisatici_resim = $yetkilisatici_resimortam;	
				}
				$query="INSERT INTO ".prefix."_yetkilisatici SET 
				".implode("",$ekler)."
				yetkilisatici_adi='$yetkilisatici_adi',
				yetkilisatici_permalink='$yetkilisatici_permalink',
				yetkilisatici_desc='$yetkilisatici_desc',
				yetkilisatici_keyw='$yetkilisatici_keyw',
				yetkilisatici_tur='$yetkilisatici_tur',
				yetkilisatici_adres='$yetkilisatici_adres',
				yetkilisatici_telefon='$yetkilisatici_telefon',
				yetkilisatici_gsm='$yetkilisatici_gsm',
				yetkilisatici_il='$yetkilisatici_il',
				yetkilisatici_ilce='$yetkilisatici_ilce',
				yetkilisatici_websitesi='$yetkilisatici_websitesi',
				yetkilisatici_maplink='$yetkilisatici_maplink',
				yetkilisatici_resim='$yetkilisatici_resim',
				yetkilisatici_aciklama='$yetkilisatici_aciklama',
				yetkilisatici_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				yetkilisatici_durum='1',
				yetkilisatici_kayitzaman='".time()."',
				yetkilisatici_dil='$yetkilisatici_dil',
				yetkilisatici_gid='$yetkilisatici_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_yetkilisatici WHERE yetkilisatici_permalink='$yetkilisatici_permalink'"));
					if($yetkilisatici_gid==""){
						query("UPDATE ".prefix."_yetkilisatici SET yetkilisatici_gid='".$sonid["yetkilisatici_id"]."' WHERE yetkilisatici_id='".$sonid["yetkilisatici_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["yetkilisatici_id"]."', 
							permalink_link='$yetkilisatici_permalink', 
							permalink_git='$yetkilisatici_permalink', 
							permalink_dil='$yetkilisatici_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_yetkilisatici WHERE yetkilisatici_id='$yetkilisatici_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["yetkilisatici_id"]."', 
							permalink_link='".$orj["yetkilisatici_permalink"]."', 
							permalink_git='$yetkilisatici_permalink', 
							permalink_dil='$yetkilisatici_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_yetkilisatici WHERE yetkilisatici_permalink='$yetkilisatici_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["yetkilisatici_gid"]."&dil=".$yetkilisatici_dil;
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
			$yetkilisatici_id=ass(p("yetkilisatici_id"));
			$yetkilisatici_adi=ass(p("yetkilisatici_adi"));
			$yetkilisatici_permalink=ass(p("yetkilisatici_permalink"));
			$yetkilisatici_desc=ass(p("yetkilisatici_desc"));
			$yetkilisatici_keyw=ass(p("yetkilisatici_keyw"));
			
			$yetkilisatici_tur=ass(p("yetkilisatici_tur"));
			$yetkilisatici_adres=ass(p("yetkilisatici_adres"));
			$yetkilisatici_telefon=ass(p("yetkilisatici_telefon"));
			$yetkilisatici_gsm=ass(p("yetkilisatici_gsm"));
			$yetkilisatici_il=ass(p("yetkilisatici_il"));
			$yetkilisatici_ilce=ass(p("yetkilisatici_ilce"));
			$yetkilisatici_websitesi=ass(p("yetkilisatici_websitesi"));
			$yetkilisatici_maplink=ass(p("yetkilisatici_maplink"));
			
			
			$yetkilisatici_resimortam=ass(p("yetkilisatici_resimortam"));
			$yetkilisatici_aciklama=ass($_POST["yetkilisatici_aciklama"]);
			$yetkilisatici_dil=ass(p("yetkilisatici_dil"));
			$yetkilisatici_gid=ass(p("yetkilisatici_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($yetkilisatici_permalink==""){
				$yetkilisatici_permalink = permalink($yetkilisatici_adi)."-".rand(1000,9999);
			}else{
				$yetkilisatici_permalink = permalink($yetkilisatici_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_yetkilisatici WHERE yetkilisatici_id='$yetkilisatici_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$yetkilisatici_permalink' and permalink_dil='$yetkilisatici_dil'"));
			
			if($yetkilisatici_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["yetkilisatici_permalink"]!=$yetkilisatici_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["yetkilisatici_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["yetkilisatici_resim"]["tmp_name"];
					$resim 		 = $_FILES["yetkilisatici_resim"]["name"];
					$rtipi		 = $_FILES["yetkilisatici_resim"]["type"];
					$rboyut		 = $_FILES["yetkilisatici_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$yetkilisatici_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("yetkilisatici_resimortam")!=""){
					$yetkilisatici_resim = $yetkilisatici_resimortam;	
				}
				
				$query="UPDATE ".prefix."_yetkilisatici SET 
				".implode("",$ekler)."
				yetkilisatici_adi='$yetkilisatici_adi',
				yetkilisatici_permalink='$yetkilisatici_permalink',
				yetkilisatici_desc='$yetkilisatici_desc',
				yetkilisatici_keyw='$yetkilisatici_keyw',
				yetkilisatici_tur='$yetkilisatici_tur',
				yetkilisatici_adres='$yetkilisatici_adres',
				yetkilisatici_telefon='$yetkilisatici_telefon',
				yetkilisatici_gsm='$yetkilisatici_gsm',
				yetkilisatici_il='$yetkilisatici_il',
				yetkilisatici_ilce='$yetkilisatici_ilce',
				yetkilisatici_websitesi='$yetkilisatici_websitesi',
				yetkilisatici_maplink='$yetkilisatici_maplink',
				yetkilisatici_resim='$yetkilisatici_resim',
				yetkilisatici_aciklama='$yetkilisatici_aciklama'
				WHERE yetkilisatici_id='$yetkilisatici_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["yetkilisatici_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$yetkilisatici_id."', 
					permalink_link='$yetkilisatici_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$yetkilisatici_id."', 
					permalink_git='$yetkilisatici_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_yetkilisatici WHERE yetkilisatici_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["yetkilisatici_durum"]==1){
					query("UPDATE ".prefix."_yetkilisatici SET yetkilisatici_durum='0' WHERE yetkilisatici_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_yetkilisatici SET yetkilisatici_durum='1' WHERE yetkilisatici_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_yetkilisatici WHERE yetkilisatici_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["yetkilisatici_permalink"]."'");
				query("DELETE FROM ".prefix."_yetkilisatici WHERE yetkilisatici_gid='$id'");
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