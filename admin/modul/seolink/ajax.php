<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "seolink";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			
			$seolink_kelime1=explode(PHP_EOL, $_POST['seolink_kelime1']);
			$seolink_kelime2=explode(PHP_EOL, $_POST['seolink_kelime2']);
			$seolink_kelime3=explode(PHP_EOL, $_POST['seolink_kelime3']);
			$seolink_kelime4=explode(PHP_EOL, $_POST['seolink_kelime4']);
			foreach($seolink_kelime1 as $key=>$deger){
				if(trim($deger)==""){unset($seolink_kelime1[$key]);}
			}
			foreach($seolink_kelime2 as $key=>$deger){
				if(trim($deger)==""){unset($seolink_kelime2[$key]);}
			}
			foreach($seolink_kelime3 as $key=>$deger){
				if(trim($deger)==""){unset($seolink_kelime3[$key]);}
			}
			foreach($seolink_kelime4 as $key=>$deger){
				if(trim($deger)==""){unset($seolink_kelime4[$key]);}
			}
			
			
			$cumleler = array();
			foreach($seolink_kelime1 as $deger1){
				$cumle = array();
				$cumle[0] = $deger1;
				
				foreach($seolink_kelime2 as $deger2){
					$cumle[1] = $deger2;
					
					foreach($seolink_kelime3 as $deger3){
						$cumle[2] = $deger3;
					
						foreach($seolink_kelime4 as $deger4){
							$cumle[3] = $deger4;
							$cumleler[] = implode(" ",$cumle);
							$cumlelerdizi[] = $cumle;
						}
					}
					
				}
				
				
			}

			
			$json['uyari'] = '<div class="alert alert-success">'.implode("<br>",$cumleler).'</div>';
			
			foreach($cumleler as $key=>$cumle){
				$seolink_adi=ass($cumle);
				$seolink_permalink=ass($cumle);
				$seolink_desc=ass($cumle);
				$seolink_keyw=ass(p("seolink_keyw"));
				$seolink_resimortam=ass(p("seolink_resimortam"));
				
				$eski = array("[1]","[2]","[3]","[4]");
				$yeni = $cumlelerdizi[$key];
				
				$seolink_aciklama=ass(str_replace($eski,$yeni,$_POST["seolink_aciklama"]));
				$seolink_dil=ass(p("seolink_dil"));
				$seolink_gid=ass(p("seolink_gid"));
				
				if($seolink_permalink==""){
					$seolink_permalink = permalink($seolink_adi)."-".rand(1000,9999);
				}else{
					$seolink_permalink = permalink($seolink_permalink);
				}
				
				$kont=rows(query("SELECT * FROM ".prefix."_seolink WHERE seolink_adi='$seolink_adi'"));
				
				if($seolink_adi==""){
					$json['tost'] = 'warning';
					$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
					$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
				}elseif($kont>0){
					$seolink_resim = $seolink_resimortam;	
					$query="UPDATE ".prefix."_seolink SET 
					seolink_permalink='$seolink_permalink',
					seolink_desc='$seolink_desc',
					seolink_resim='$seolink_resim',
					seolink_aciklama='$seolink_aciklama'
					WHERE seolink_adi='$seolink_adi' ";
					$ekle=query($query);
					if($ekle){
						
						$json['tost'] = 'success';
						$json['mesaj'] = 'Kayıt işlemi başarılı.';
						$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					}else{
						$json['tost'] = 'danger';
						$json['mesaj'] = queryalert($query);
						$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
					}
				}else{
					$seolink_resim = $seolink_resimortam;	
					$query="INSERT INTO ".prefix."_seolink SET 
					seolink_adi='$seolink_adi',
					seolink_permalink='$seolink_permalink',
					seolink_desc='$seolink_desc',
					seolink_keyw='$seolink_keyw',
					seolink_resim='$seolink_resim',
					seolink_aciklama='$seolink_aciklama',
					seolink_ekleyen='".$config["yonetici"]["yonetici_id"]."',
					seolink_durum='1',
					seolink_kayitzaman='".time()."',
					seolink_dil='$seolink_dil',
					seolink_gid='$seolink_gid'
					";
					$ekle=query($query);
					if($ekle){
						
						
						$sonid = row(query("SELECT * FROM ".prefix."_seolink WHERE seolink_permalink='$seolink_permalink'"));
						if($seolink_gid==""){
							query("UPDATE ".prefix."_seolink SET seolink_gid='".$sonid["seolink_id"]."' WHERE seolink_id='".$sonid["seolink_id"]."'");
							// query("INSERT INTO ".prefix."_permalink SET 
								// permalink_modulid='".$sonid["seolink_id"]."', 
								// permalink_link='$seolink_permalink', 
								// permalink_git='$seolink_permalink', 
								// permalink_dil='$seolink_dil' 
							// ");
						}else{
							$orj=row(query("SELECT * FROM ".prefix."_seolink WHERE seolink_id='$seolink_gid'"));
							// query("INSERT INTO ".prefix."_permalink SET 
								// permalink_modulid='".$sonid["seolink_id"]."', 
								// permalink_link='".$orj["seolink_permalink"]."', 
								// permalink_git='$seolink_permalink', 
								// permalink_dil='$seolink_dil' 
							// ");
						}
						$sonid = row(query("SELECT * FROM ".prefix."_seolink WHERE seolink_permalink='$seolink_permalink'"));
						
						$json['tost'] = 'success';
						$json['mesaj'] = 'Kayıt işlemi başarılı.';
						$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					}else{
						$json['tost'] = 'danger';
						$json['mesaj'] = queryalert($query);
						$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
					}
					
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
			$seolink_id=ass(p("seolink_id"));
			$seolink_adi=ass(p("seolink_adi"));
			$seolink_permalink=ass(p("seolink_permalink"));
			$seolink_desc=ass(p("seolink_desc"));
			$seolink_keyw=ass(p("seolink_keyw"));
			$seolink_resimortam=ass(p("seolink_resimortam"));
			$seolink_kisaaciklama=ass($_POST["seolink_kisaaciklama"]);
			$seolink_aciklama=ass($_POST["seolink_aciklama"]);
			$seolink_dil=ass(p("seolink_dil"));
			$seolink_gid=ass(p("seolink_gid"));
			
			if($seolink_permalink==""){
				$seolink_permalink = permalink($seolink_adi)."-".rand(1000,9999);
			}else{
				$seolink_permalink = permalink($seolink_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_seolink WHERE seolink_id='$seolink_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$seolink_permalink' and permalink_dil='$seolink_dil'"));
			
			if($seolink_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["seolink_permalink"]!=$seolink_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["seolink_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["seolink_resim"]["tmp_name"];
					$resim 		 = $_FILES["seolink_resim"]["name"];
					$rtipi		 = $_FILES["seolink_resim"]["type"];
					$rboyut		 = $_FILES["seolink_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$seolink_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("seolink_resimortam")!=""){
					$seolink_resim = $seolink_resimortam;	
				}
				
				$query="UPDATE ".prefix."_seolink SET 
				seolink_adi='$seolink_adi',
				seolink_permalink='$seolink_permalink',
				seolink_desc='$seolink_desc',
				seolink_keyw='$seolink_keyw',
				seolink_resim='$seolink_resim',
				seolink_kisaaciklama='$seolink_kisaaciklama',
				seolink_aciklama='$seolink_aciklama'
				WHERE seolink_id='$seolink_id'
				";
				$ekle=query($query);
				if($ekle){
					
					// $eski_permalink = $eski["seolink_permalink"];
					// query("UPDATE ".prefix."_permalink SET
					// permalink_link='$seolink_permalink'
					// WHERE permalink_link='$eski_permalink'");
					
					// query("UPDATE ".prefix."_permalink SET
					// permalink_git='$seolink_permalink'
					// WHERE permalink_git='$eski_permalink'");
					
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
			$oku=row(query("SELECT * FROM ".prefix."_seolink WHERE seolink_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["seolink_durum"]==1){
					query("UPDATE ".prefix."_seolink SET seolink_durum='0' WHERE seolink_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_seolink SET seolink_durum='1' WHERE seolink_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_seolink WHERE seolink_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["seolink_permalink"]."'");
				query("DELETE FROM ".prefix."_seolink WHERE seolink_gid='$id'");
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