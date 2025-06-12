<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "urun";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$urun_adi=ass(p("urun_adi"));
			$urun_permalink=ass(p("urun_permalink"));
			$urun_fiyat=ass(p("urun_fiyat"));
			$urun_seans=ass(p("urun_seans"));
			$urun_haftaseans=ass(p("urun_haftaseans"));
			$urun_seanssure=ass(p("urun_seanssure"));
			$urun_yuzyuzeseans=ass(p("urun_yuzyuzeseans"));
			$urun_takvimtur=ass(p("urun_takvimtur"));
			$urun_desc=ass(p("urun_desc"));
			$urun_keyw=ass(p("urun_keyw"));
			$urun_kategori=ass(p("urun_kategori"));
			$urun_resimortam=ass(p("urun_resimortam"));
			$urun_resimlerortam=$_POST["urun_resimlerortam"];
			$urun_aciklama=ass($_POST["urun_aciklama"]);
			$urun_dil=ass(p("urun_dil"));
			$urun_gid=ass(p("urun_gid"));
			$urun_aralik=serialize($_POST["aralik"]);
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($urun_permalink==""){
				$urun_permalink = permalink($urun_adi)."-".rand(1000,9999);
			}else{
				$urun_permalink = permalink($urun_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$urun_permalink' and permalink_dil='$urun_dil'"));
			
			if($urun_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["urun_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["urun_resim"]["tmp_name"];
					$resim 		 = $_FILES["urun_resim"]["name"];
					$rtipi		 = $_FILES["urun_resim"]["type"];
					$rboyut		 = $_FILES["urun_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$urun_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("urun_resimortam")!=""){
					$urun_resim = $urun_resimortam;	
				}
				
				$urun_resimler = array();
				for($i=0;$i<count($_FILES["urun_resimler"]["tmp_name"]);$i++){
					if($_FILES["urun_resimler"]["tmp_name"][$i]!=""){
						$kaynak		 = $_FILES["urun_resimler"]["tmp_name"][$i];
						$resim 		 = $_FILES["urun_resimler"]["name"][$i];
						$rtipi		 = $_FILES["urun_resimler"]["type"][$i];
						$rboyut		 = $_FILES["urun_resimler"]["size"][$i];
						$hedef 		 = "../../app/Images";
						$urun_resimler[]=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
					}elseif($urun_resimlerortam[$i]!=""){
						$urun_resimler[] = $urun_resimlerortam[$i];	
					}
				}
				$urun_resimler = serialize($urun_resimler);
				
				$query="INSERT INTO ".prefix."_urun SET 
				".implode("",$ekler)."
				urun_adi='$urun_adi',
				urun_permalink='$urun_permalink',
				urun_fiyat='$urun_fiyat',
				urun_seans='$urun_seans',
				urun_haftaseans='$urun_haftaseans',
				urun_seanssure='$urun_seanssure',
				urun_yuzyuzeseans='$urun_yuzyuzeseans',
				urun_takvimtur='$urun_takvimtur',
				urun_aralik='$urun_aralik',
				urun_desc='$urun_desc',
				urun_keyw='$urun_keyw',
				urun_kategori='$urun_kategori',
				urun_resim='$urun_resim',
				urun_resimler='$urun_resimler',
				urun_aciklama='$urun_aciklama',
				urun_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				urun_durum='1',
				urun_kayitzaman='".time()."',
				urun_dil='$urun_dil',
				urun_gid='$urun_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_urun WHERE urun_permalink='$urun_permalink'"));
					if($urun_gid==""){
						query("UPDATE ".prefix."_urun SET urun_gid='".$sonid["urun_id"]."' WHERE urun_id='".$sonid["urun_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["urun_id"]."', 
							permalink_link='$urun_permalink', 
							permalink_git='$urun_permalink', 
							permalink_dil='$urun_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_urun WHERE urun_id='$urun_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["urun_id"]."', 
							permalink_link='".$orj["urun_permalink"]."', 
							permalink_git='$urun_permalink', 
							permalink_dil='$urun_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_urun WHERE urun_permalink='$urun_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["urun_gid"]."&dil=".$urun_dil;
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
			$urun_id=ass(p("urun_id"));
			$urun_adi=ass(p("urun_adi"));
			$urun_permalink=ass(p("urun_permalink"));
			$urun_fiyat=ass(p("urun_fiyat"));
			$urun_seans=ass(p("urun_seans"));
			$urun_haftaseans=ass(p("urun_haftaseans"));
			$urun_seanssure=ass(p("urun_seanssure"));
			$urun_yuzyuzeseans=ass(p("urun_yuzyuzeseans"));
			$urun_takvimtur=ass(p("urun_takvimtur"));
			$urun_desc=ass(p("urun_desc"));
			$urun_keyw=ass(p("urun_keyw"));
			$urun_kategori=ass(p("urun_kategori"));
			$urun_resimortam=ass(p("urun_resimortam"));
			$urun_resimlerortam=$_POST["urun_resimlerortam"];
			$urun_aciklama=ass($_POST["urun_aciklama"]);
			$urun_dil=ass(p("urun_dil"));
			$urun_gid=ass(p("urun_gid"));
			$urun_aralik=serialize($_POST["aralik"]);
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($urun_permalink==""){
				$urun_permalink = permalink($urun_adi)."-".rand(1000,9999);
			}else{
				$urun_permalink = permalink($urun_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_urun WHERE urun_id='$urun_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$urun_permalink' and permalink_dil='$urun_dil'"));
			
			if($urun_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["urun_permalink"]!=$urun_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["urun_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["urun_resim"]["tmp_name"];
					$resim 		 = $_FILES["urun_resim"]["name"];
					$rtipi		 = $_FILES["urun_resim"]["type"];
					$rboyut		 = $_FILES["urun_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$urun_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("urun_resimortam")!=""){
					$urun_resim = $urun_resimortam;	
				}
				$urun_resimler = array();
				for($i=0;$i<count($_FILES["urun_resimler"]["tmp_name"]);$i++){
					if($_FILES["urun_resimler"]["tmp_name"][$i]!=""){
						$kaynak		 = $_FILES["urun_resimler"]["tmp_name"][$i];
						$resim 		 = $_FILES["urun_resimler"]["name"][$i];
						$rtipi		 = $_FILES["urun_resimler"]["type"][$i];
						$rboyut		 = $_FILES["urun_resimler"]["size"][$i];
						$hedef 		 = "../../app/Images";
						$urun_resimler[]=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
					}elseif($urun_resimlerortam[$i]!=""){
						$urun_resimler[] = $urun_resimlerortam[$i];	
					}
				}
				$urun_resimler = serialize($urun_resimler);
				
				$query="UPDATE ".prefix."_urun SET 
				".implode("",$ekler)."
				urun_adi='$urun_adi',
				urun_permalink='$urun_permalink',
				urun_fiyat='$urun_fiyat',
				urun_seans='$urun_seans',
				urun_haftaseans='$urun_haftaseans',
				urun_seanssure='$urun_seanssure',
				urun_yuzyuzeseans='$urun_yuzyuzeseans',
				urun_takvimtur='$urun_takvimtur',
				urun_aralik='$urun_aralik',
				urun_desc='$urun_desc',
				urun_keyw='$urun_keyw',
				urun_kategori='$urun_kategori',
				urun_resim='$urun_resim',
				urun_resimler='$urun_resimler',
				urun_aciklama='$urun_aciklama'
				WHERE urun_id='$urun_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["urun_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$urun_id."', 
					permalink_link='$urun_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$urun_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$urun_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["urun_durum"]==1){
					query("UPDATE ".prefix."_urun SET urun_durum='0' WHERE urun_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_urun SET urun_durum='1' WHERE urun_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["urun_permalink"]."'");
				query("DELETE FROM ".prefix."_urun WHERE urun_gid='$id'");
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